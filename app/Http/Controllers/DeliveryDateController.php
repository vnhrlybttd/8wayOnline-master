<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;

class DeliveryDateController extends Controller
{
    public function update(Request $request , $id)
    {

        request()->validate([
            'ship_date' => 'required|date',
        ]);


        $table = Orders::findOrFail($id);
        
        $table->update($request->all());
      
        alert()->success('Success',' Delivery Date edited successfully!')->autoClose(5000);

        
        return redirect()->back();

    }
}
