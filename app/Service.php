<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

  protected $fillable=['category','service','icon','price','description','offer','sale'];

  function rel_to_categories()
    {
        return $this->hasOne('App\ServiceCategory', 'id', 'category');
        // return $this->hasOne('App\ServiceCategory','category','id');
    }

}
