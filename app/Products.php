<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    protected $fillable = [
        'products' ,'price' ,'unit','stocks','description','image','category_name_link','sale','sale_status'
    ];

    protected $attributes = [
        'sale' => null
    ];

    public $timestamps = true;

    
}
