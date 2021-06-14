<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\Products;
use App\OrderList;
use DB;
use App\Payments;
use Alert;
use App\Category;




class CustomerCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $category = Category::get();

        $products = Products::
        get();
        
        

       

        




        


    

        return view('welcome',compact('products','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            request()->validate([
                'full_name' => 'required',
                'email' => 'required|email',
                'street_address' => 'required',
                'payment_method' => 'required',
                'delivery_options' => 'required',
                'order_status' => 'required',
                'invoice_status' => 'required',
                'payment_status' => 'required',
            ]);
    
            $delivery = $request->delivery_options;

           

            if($delivery === '1')
            {
                $result = Orders::create($request->all());
            }
            elseif($delivery === '2')
            {
                $result = Orders::create([
                    'full_name' => $request->full_name,
                    'email' => $request->email,
                    'street_address' => $request->street_address,
                    'phone_number' => $request->phone_number,
                    'comments' => $request->comments,
                    'payment_method' => $request->payment_method,
                    'delivery_options' => $request->delivery_options,
                    'order_status' => $request->order_status,
                    'invoice_status' => $request->invoice_status,
                    'payment_status' => $request->payment_status,
                    'delivery_status' => 6,
                ]);
            }
            
            
            $orders = Orders::latest()->first()->id;
            
            for ($i = 0; $i < count($request->product_id); $i++) {
                
                $results[] = [
                    'order_id' => $orders,
                    'quantity' => $request->quantity[$i],
                    'product_id' => $request->product_id[$i],
                    'product_name' => $request->product_name[$i],
                    'product_unit' => $request->product_unit[$i],
                    'priceOrder' => $request->priceOrder[$i]
                ];
                
                
                $add = array_sum($request->quantity);
                $ids = $this->$result = array('order_id' => $orders);
            }
            
          /*   $update =  - $update->stocks;
            $update->save();  */

            
          
        
            $results = OrderList::insert($results);

            

        $table2 = DB::table('order_lists')
        ->join('orders','orders.id','=','order_lists.order_id')
        ->join('products','products.id' ,'=','order_lists.product_id')
        ->where('order_id',$ids)
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

            $insertPayment = Payments::insert([
                'order_number_link' => $orders,
                'client_name' => $request->full_name,
                'payment_method' => $request->payment_method,
                'amount' => '0',
                'total_amount_ordered' => '0',
                //'date_paid' => null,
                //'payment_status_new' => '1'
                ]);

            //dd($insertPayment);


            alert()->success('Your Order was succssfully submitted!',' Thank you for Ordering at 8wayOnline')->autoClose(8000);
          
            return redirect()->action('CustomerCartController@index');
            } 
            catch (\Throwable $th) {
            throw $th;
            }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
