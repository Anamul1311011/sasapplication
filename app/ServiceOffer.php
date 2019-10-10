<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceOffer extends Model
{
    protected $fillable=['category','title','image','price','description'];

    public function rel_to_categories()
    {
        return $this->hasOne('App\ServiceOfferCategory','id','category');
    }
}
