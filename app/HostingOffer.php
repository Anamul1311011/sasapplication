<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HostingOffer extends Model
{
    protected $fillable=['title','offer','description','price'];
}
