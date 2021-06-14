<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'order_number_link','client_name','payment_method','amount','date_paid','total_amount_ordered'
    ];

    protected $attributes = [
        'date_paid' => null , 'amount' => null ,'total_amount_ordered' => null
    ];

    public $timestamps = true;
}
