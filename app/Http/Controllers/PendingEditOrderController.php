<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Orders;
use App\OrderList;
use App\Payments;
use DB;

class PendingEditOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        //
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
        $orderEdit = Orders::findOrFail($id);
        $orderEdit->full_name = $request->full_name;
        $orderEdit->email = $request->email;
        $orderEdit->street_address = $request->street_address;
        $orderEdit->phone_number = $request->phone_number;
        $orderEdit->comments = $request->comments;
        $orderEdit->payment_method = $request->payment_method;
        $orderEdit->delivery_options = $request->delivery_options;
        $orderEdit->save();

        $orderListEdit = DB::table('order_lists')->where('order_id','=',$id)->get()->toArray();

       
        
        //$quantity = $request->id;
    
        for ($i = 0; $i < count($orderListEdit); $i++) {
                

            $result = DB::table('order_lists')
            ->where('id','=',$request->order_lists_id[$i])
            ->update([
                'product_id' =>$request->product_id[$i],
                'quantity' => $request->quantity[$i],
                'priceOrder' => $request->priceOrder[$i]
            ]);

          

        } 

      
      
        alert()->success('Success',' Edited order successfully!')->autoClose(5000);

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

    
            
            alert()->success('Success','Confirmed Order was deleted successfully!')->autoClose(5000);
    
    
            return redirect()->route('confirmed_order.index');
            } catch (\Throwable $th) {
                throw $th;
            }
    }
}
