<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class Orders extends Model
{

    public function orderList(){
        return $this->haveMany('App\OrderList');
    }

    protected $table = 'orders';
    
    protected $fillable = [
        'full_name', 'email' ,'street_address','payment_method' ,'delivery_options' ,'order_status','invoice_status','payment_status','delivery_status','ship_date','comments','phone_number'
    ];

    protected $attributes = [
        'ship_date' => null,'comments'=>'No Comment','phone_number' => '0','delivery_status' => '1'
    ];

    public $timestamps = true;

    
}
