<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\Products;
use App\OrderList;
use App\Payments;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $pendingOrders = Orders::
        where('order_status','=','1')
       ->count();

       $completedOrders = Orders::
        where('order_status','=','2')
        ->where('payment_status','=','2')
       ->count();

      

       $pendingPayments = Payments::join('orders','orders.id','=','payments.order_number_link')
       ->where('order_status','=','2')
       ->where('payment_status','=','1')
       ->count();


       $totalEarnings = Payments::sum('total_amount_ordered');


       $totalDelivered = Orders::whereIn('delivery_status',['3','7'])
       ->count();

       $totalShipped = Orders::where('delivery_status','=','2')
       ->count();

       $pendingDelivery = Orders::where('delivery_status','=','1')
       ->where('order_status','=','2')
       ->count();
    

       $shippedTable = Orders::where('order_status','=','2')
       ->where('delivery_status','=','2')
        ->get();

        $pendingTable = Orders::where('order_status','=','2')
        ->where('delivery_status','=','1')
         ->get();

       //dd($totalDelivered);


        return view('dashboard.index',compact('pendingOrders','completedOrders','totalEarnings'
        ,'pendingPayments','totalDelivered','totalShipped','pendingDelivery','shippedTable','pendingTable'
    ));
    }
}
