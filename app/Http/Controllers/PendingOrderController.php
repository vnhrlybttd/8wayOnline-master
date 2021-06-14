<?php

namespace App\Http\Controllers;

use DB;
use Alert;
use App\Orders;
use App\OrderList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;
use App\Products;
use App\Payments;

class PendingOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Orders::latest()
        ->where('order_status' ,'=' ,'1')
        ->latest()
        ->get();

        //dd($orders);

        $orderList = DB::table('order_lists')
        ->join('orders','orders.id','=','order_lists.order_id')
        //->join('products','products.id' ,'=','order_lists.product_id')
        ->where('quantity','!=',0)
        ->orderBy('order_id','DESC')
        //->latest()
        ->get();


        $orderListEdit = DB::table('order_lists')
        //->join('orders','orders.id','=','order_lists.order_id')
        //->join('products','products.id' ,'=','order_lists.product_id')
        //->where('quantity','!=',0)
        //->orderBy('order_id','DESC')
        //->latest()
        ->get();

        
        $totals = DB::table('order_lists')
        ->select('order_id',DB::raw('sum(quantity * priceOrder) as total'))
        ->leftJoin('orders','orders.id','=','order_lists.order_id')
        ->groupBy('order_id')
        ->get();
        //dd($totals);

        //dd($totals);

        $products = Products::latest()->get();
       
        
      
        //dd($products);

        
        return view ('pendingOrder.index',compact('orders','orderList','totals','products','orderListEdit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
       /*  $id = $request->order_id;

        for ($i = 0; $i < count($request->quantity); $i++) {
                
            $results[] = [
                'order_id' => $id,
                'quantity' => $request->quantity[$i],
                'product_id' => $request->product_id[$i],
                'product_name' => $request->product_name[$i],
                'product_unit' => $request->product_unit[$i],
                'priceOrder' => $request->priceOrder[$i]
            ];  
        }
        

        $results = OrderList::insert($results);

        alert()->success('Success',' Added Order successfully!')->autoClose(5000);

        
        return redirect()->route('pending_order.index'); */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        


     
        
         

        $orders = Orders::findOrFail($id);
        $orders->order_status = $request->order_status;
        $orders->ship_date = $request->ship_date;
        $orders->save();



        $table = Orders::findOrFail($id);

        $orderList = Orders::join('order_lists','order_lists.order_id','=','orders.id')
        //->join('products','products.id' ,'=','order_lists.product_id')
        ->where('quantity','!=',0)
        ->where('order_id','=',$id)
        ->get();

        $totals = DB::table('order_lists')
        ->select('order_id',DB::raw('sum(quantity * priceOrder) as total'))
        ->leftJoin('orders','orders.id','=','order_lists.order_id')
        ->where('order_id','=',$id)
        ->groupBy('order_id')
        ->get();

        $tables = array(
            'email' => $table->email,
            'name' => $table->full_name
        );


        $table2 = DB::table('order_lists')
        ->join('orders','orders.id','=','order_lists.order_id')
        ->join('products','products.id' ,'=','order_lists.product_id')
        ->where('order_id',$id)
        ->select('quantity','stocks','product_id')
        ->get()
        ->toArray(); 
 

      

        for ($z = 0; $z < count($table2); $z++)
        {
          

            $check = DB::table('products')
            ->where('id',$table2[$z]->product_id)
            ->update([
                'stocks' => $table2[$z]->stocks - $table2[$z]->quantity
            ]);

           
        }

        

        
        if($request->emailSend === "1")
        {
            
            Mail::send(['text'=>'email'], $tables, function($message) use ($table,$orderList,$totals,$tables){

                $pdf = PDF::loadView('pdf.invoice',compact('table','orderList','totals'));
        
                $message->to($tables['email'])->subject('Mercancías');
        
                $message->from('mercanciasol@gmail.com','Mercancías');
        
                $message->attachData($pdf->output(), 'invoice.pdf');
        
            });
    
    
            Mail::send(['text'=>'emailCopy'], $tables, function($message) use ($table,$orderList,$totals,$tables){
    
                $pdf = PDF::loadView('pdf.invoice',compact('table','orderList','totals'));
        
                $message->to('mercanciasol@gmail.com')->subject('Mercancías');
        
                $message->from('mercanciasol@gmail.com','Mercancías Copy Invoice of Customer');
        
                $message->attachData($pdf->output(), 'invoice.pdf');
        
            });

        }
        else
        {
        
        }
        


       
        
        alert()->success('Success',' Confirmed Order successfully!')->autoClose(5000);

        
        return redirect()->route('pending_order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       
        try {


            $orderList = DB::Table('order_lists')->where('order_id','=',$id)->select('product_id','quantity')->get()->toArray();
     
            for ($i=0; $i < count($orderList); $i++)
            {
            
            $check = DB::Table('products')->where('id',$orderList[$i]->product_id)
            ->increment('stocks',$orderList[$i]->quantity);
            }

           
        $delete = OrderList::where('order_id',$id)->firstOrFail();
        $delete->delete();

        $deleteOrder = Orders::where('id',$id);
        $deleteOrder->delete();

        $paymentDelete = Payments::where('order_number_link',$id);
        $paymentDelete->delete();

        
        alert()->success('Success','Pending Order was deleted successfully!')->autoClose(5000);


        return redirect()->route('pending_order.index');
        } catch (\Throwable $th) {
            throw $th;
        }

        
    }
}
