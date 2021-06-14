<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\Payments;
use DB;


class ConfirmedPaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $payments = Payments::join('orders','orders.id','=','payments.order_number_link')
        ->where('order_status','=','2')
        ->where('payment_status','=','2')
        ->get();


        $totals = DB::table('order_lists')
        ->select('order_id',DB::raw('sum(quantity * priceOrder) as total'))
        ->leftJoin('orders','orders.id','=','order_lists.order_id')
        ->groupBy('order_id')
        ->get();

        return view('confirmedPayments.index',compact('payments','totals'));
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
