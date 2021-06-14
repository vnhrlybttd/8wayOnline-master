<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\Products;
use App\OrderList;
use App\Payments;
use App\Category;
use DB;
use Alert;

class CustomerCategoryController extends Controller
{
    public function category(Request $request ,$id){

        //dd($request->id);

        $category = Category::where('id',$id)->latest()->get();
     
        $products = Products::get();

        return view('customerCart.products',compact('products','category'));


    }
}
