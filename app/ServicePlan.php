<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicePlan extends Model
{
    protected $fillable=['service','package','basic','premium','price'];
}
