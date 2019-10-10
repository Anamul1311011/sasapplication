<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppCatDetail extends Model
{
    public function rel_to_categories()
    {
        return $this->hasOne('App\ApplicationCategory','id','category');
    }

    protected $fillable=['category','image','price'];
}
