<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public $timestamps = false;
    protected $table = 'orderdetails';
    protected $primaryKey = 'orderDetailsId';
}
