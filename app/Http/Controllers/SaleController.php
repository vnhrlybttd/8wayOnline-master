<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class SaleController extends Controller
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

        

        if($request->sale_status === "1")
        {

            $sale = Products::findOrFail($id);
            $sale->price = $request->sale;
            $sale->sale = $request->orig_price;
            $sale->sale_status = $request->sale_status;
            $sale->save();
            alert()->success('Success',' Sale added successfully!')->autoClose(5000);

        }
        elseif($request->sale_status === "0")
        {
            $sale = Products::findOrFail($id);
            $sale->price = $request->orig_price;
            $sale->sale = $request->sale;
            $sale->sale_status = $request->sale_status;
            $sale->save();

            alert()->success('Success',' Sale removed successfully!')->autoClose(5000);
        }
        

       
      

       

        return redirect()->route('products.index');
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
