<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleApplication extends Model
{
    protected $fillable=['title','image','icon','price','description'];
}
