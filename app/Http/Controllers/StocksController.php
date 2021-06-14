<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stocks;
use App\Products;

class StocksController extends Controller
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
        
        request()->validate([
            'product_id_linked' => 'required',
            'product_name' => 'required',
            'operation' => 'required',
            'quantity_number' => 'required',
            ]);

        
        

        if($request->operation === '1')
        {
            $total = $request->stocks + $request->quantity_number;
            $products = Products::findOrFail($id);
            $products->stocks = $total;
            $products->save();
            
           
            
            $stocks = Stocks::insert([
                'product_id_linked' => $request->product_id_linked,
                'product_name' => $request->product_name,
                'operation' => $request->operation,
                'quantity_number' => $request->quantity_number
            ]);


           
        }
        elseif($request->operation === "2")
        {
            $total = $request->stocks - $request->quantity_number;
            $products = Products::findOrFail($id);
            $products->stocks = $total;
            $products->save();
            
           
            
            $stocks = Stocks::insert([
                'product_id_linked' => $request->product_id_linked,
                'product_name' => $request->product_name,
                'operation' => $request->operation,
                'quantity_number' => $request->quantity_number
            ]);
        }

        


      
      

        alert()->success('Success',' Stocks updated successfully!')->autoClose(5000);

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
