<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'userTypeId';
    protected $table = 'usertype';
}
