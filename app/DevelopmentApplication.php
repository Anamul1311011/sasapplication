<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DevelopmentApplication extends Model
{
    protected $fillable=['title','icon','image','price','description'];
}
