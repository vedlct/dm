<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $timestamps = false;
    protected $primaryKey = 'productId';
    protected $table = 'product';

    protected $fillable = [
        'productName', 'price'
    ];
}
