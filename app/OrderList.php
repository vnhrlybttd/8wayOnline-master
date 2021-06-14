<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{


    public function orders(){
        return $this->belongsTo('App\Orders');
    }

    protected $table = 'order_lists';


    protected $fillable = [
        'product_id' , 'quantity' ,'priceOrder','product_name','product_unit'
    ];

    public $timestamps = true;

}
