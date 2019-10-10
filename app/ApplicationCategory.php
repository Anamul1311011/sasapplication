<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationCategory extends Model
{
    protected $fillable=['category','description'];

    public function rel_to_details()
    {
        return $this->hasOne('App\AppCatDetail','category','id');
    }
}
