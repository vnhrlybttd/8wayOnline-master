<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use App\Orders;
use App\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class PendingPaymentsController extends Controller
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
        ->where('payment_status','=','1')
        ->get();


        $totals = DB::table('order_lists')
        ->select('order_id',DB::raw('sum(quantity * priceOrder) as total'))
        ->leftJoin('orders','orders.id','=','order_lists.order_id')
        ->groupBy('order_id')
        ->get();

        //dd($payments);

        return view('pendingPayments.index',compact('payments','totals'));
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
        
       

        try {

            
           

            request()->validate([
                'amount' => 'required',
                'date_paid' => 'required',
                'payment_status' => 'required',
                'total_amount_ordered' => 'required',
                ]);
    
            $payments = Payments::where('order_number_link','=',$id)->firstOrFail();
            $payments->amount = $request->amount;
            $payments->date_paid = $request->date_paid;
            $payments->total_amount_ordered = $request->total_amount_ordered;
            $payments->save();
            
         
          
    
            $orders = Orders::findOrFail($id);
            $orders->payment_status = $request->payment_status;
            $orders->save();
    
    
    
            alert()->success('Success',' Confirmed payment successfully!')->autoClose(5000);
    
            return redirect()->route('pending_payments.index');
        } catch (\Throwable $th) {
            throw $th;
        }

        
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
