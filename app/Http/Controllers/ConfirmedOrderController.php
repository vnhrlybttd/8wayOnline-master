<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\OrderList;
use DB;
use App\Products;

class ConfirmedOrderController extends Controller
{
    public function index()
    {
        $orders = Orders::latest()
        ->where('order_status' ,'=' ,'2')
        ->latest()
        ->get();

        $orderList = DB::table('order_lists')
        ->join('orders','orders.id','=','order_lists.order_id')
        //->join('products','products.id' ,'=','order_lists.product_id')
        ->where('quantity','!=',0)
        ->orderBy('order_id','DESC')
        ->get();


        return view('confirmedOrder.index',compact('orders','orderList'));
    }

    public function update($id)
    {


       

        $orderList = DB::Table('order_lists')->where('order_id','=',$id)->select('product_id','quantity')->get()->toArray();

        
     
        for ($i=0; $i < count($orderList); $i++)
        {
            
            $check = DB::Table('products')->where('id',$orderList[$i]->product_id)
            ->increment('stocks',$orderList[$i]->quantity);
        }
        
        $orders = Orders::findOrFail($id);
        $orders->order_status = '1';
        $orders->save();


        

        alert()->success('Success',' Transferred to Pending Order successfully!')->autoClose(5000);

        
        return redirect()->route('confirmed_order.index');
    }
}
