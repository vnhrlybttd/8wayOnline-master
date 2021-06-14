<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{

    protected $table = 'stocks';


    protected $fillable = [
        'product_id_linked' ,'product_name','operation','quantity_number'
     ];

    public $timestamps = true;
}
