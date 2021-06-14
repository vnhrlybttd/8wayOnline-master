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
use Session;

class CustomerController extends Controller
{
    

    public function home(){

        $category = Category::latest()->get();

        $products = Products::inRandomOrder()->take(6)->distinct()->get();
        
        return view('customerCart.home',compact('products','category'));

    }


    public function products(Request $request){

       
        $category = Category::latest()->get();
     
        $products = Products::get();

        return view('customerCart.products',compact('products','category'));
    

    }

    public function productsAJAX(Request $request)
    {
        if($request->ajax()){

     
        $category = Category::latest()->paginate(1)
        ->appends(request()->input());
        $products = Products::get();

        return view('customerCart.pagination',compact('products','category'))->render();

    }
    }


    public function payments(Request $request){

        

  

        $validatedData = $request->validate([
            'product_id' => 'required',
            'product_name' => 'required',
            'product_unit' => 'required',
            'priceOrder' => 'required',
            'quantity' => 'required',
        ]);
     
       

        $product_id = $request->get('product_id');
        $product_name = $request->get('product_name');
        $product_unit = $request->get('product_unit');
        $priceOrder = $request->get('priceOrder');
        $quantity = $request->get('quantity'); 

        
         if(empty($request->session()->get('order_lists'))){
            $products = new OrderList();
            $products->fill($validatedData);
            $request->session()->put('order_lists', $products);
           
        }else{
            $products = $request->session()->get('order_lists');
            $products->fill($validatedData);
            $request->session()->put('order_lists',$products);
            
            } 

            $session = $request->session()->get('order_lists')->toArray();
              
            
            for($i=0; $i < count($request->product_id); $i++)
            {
                $total[] = $session['priceOrder'][$i] * $session['quantity'][$i];      
            }
           
            $average = array_sum($total);
           

        return view('customerCart.payments',compact('session','average'));
    }

    public function checkout(Request $request){


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


            alert()->success('Thank you for ordering at Mercancías','Please wait to hear from us via email confirmation that your order is being processed')->autoClose(8000);
          
            return redirect()->action('CustomerController@home');
            } 
            catch (\Throwable $th) {
            throw $th;
            }



    }

}
