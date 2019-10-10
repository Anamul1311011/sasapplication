<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationOffer extends Model
{
    protected $fillable=['title','offer','description','price'];
}
