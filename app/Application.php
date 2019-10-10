<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable=['category','title','image','icon','price','description'];

    public function rel_to_categories()
    {
        return $this->hasOne('App\ApplicationCategory','id','category');
    }
}
