<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Units;
use Alert;
use App\Images;
use App\Category;
use App\Stocks;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Units::all();
        $units->isEmpty();

        $products = Products::orderBy('id','desc')->get();

        $unitsSelect = Units::latest()->get();
        $categorySelect = Category::latest()->get();

        $stocks = Stocks::orderBy('id','desc')->get();
    

        

        return view('products.index',compact('products','units','unitsSelect','categorySelect','stocks'));
    
           
        

        
        
      
        
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $select = Units::all();
        return view('products.create',compact('select'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'products' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'stocks' => 'required',
            'description' => 'required',
            'category_name_link' => 'required',
        ]);

        //dd($request->image);
                   

                if($files=$request->file('image')){
                    
                        $name=$files->getClientOriginalName();
                        $files->move('image',$name);
                        //$images[]=$name;

                        
                }
            
               

                //dd($request->image);

                $products = Products::insert([
                    'products' => $request->products,
                    'price' => $request->price,
                    'unit' => $request->unit,
                    'stocks' => $request->stocks,
                    'description' => $request->description,
                    'image' => $name,
                    'category_name_link' => $request->category_name_link,
                    'sale_status' => $request->sale_status
                ]);

    
     


       

        

    
        alert()->success('Success',' Product created successfully!')->autoClose(8000);


        return redirect()->route('products.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {
        return view('products.show',compact('product'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        $select = Units::all();
        return view('products.edit',compact('product','select'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
         request()->validate([
            'products' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'stocks' => 'required',
            'description' => 'required',
            'category_name_link' => 'required',
            
        ]);
    
        if($files=$request->file('image')){
                    
            $name=$files->getClientOriginalName();
            $files->move('image',$name);


            $product->update(
                [
                    'products' => $request->products,
                    'price' => $request->price,
                    'unit' => $request->unit,
                    'stocks' => $request->stocks,
                    'description' => $request->description,
                    'image' => $name,
                    'sale_status' => $request->sale_status
                    
                ]
            );
        }
       
        $product->update(
            [
                'products' => $request->products,
                'price' => $request->price,
                'unit' => $request->unit,
                'stocks' => $request->stocks,
                'description' => $request->description,
                'category_name_link' => $request->category_name_link,
                'sale_status' => $request->sale_status
            ]
        );

      
    
        alert()->success('Success',' Product updated successfully!')->autoClose(8000);
        return redirect()->route('products.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $id = $product->id;

        $product->delete();


    
        alert()->success('Success',' Product deleted successfully!')->autoClose(8000);

        return redirect()->route('products.index');
                        
    }
}
