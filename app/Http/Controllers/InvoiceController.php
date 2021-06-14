<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\OrderList;
use App\Product;
use PDF;
use DB;

class InvoiceController extends Controller
{
    public function pdf($id){
        
        
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

        

        $pdf = PDF::loadView('pdf.invoice',compact('table','orderList','totals'));
        return $pdf->stream();
        //$pdf->output();
        //return $pdf->download('invoice');
  
        //$pdf->save(storage_path().'_filename.pdf');
        //return view('pdf.invoice');

        //$pdf = PDF::loadView('pdf.invoice', compact('table'));
        //return $pdf->download('invoice.pdf');

    }
}
