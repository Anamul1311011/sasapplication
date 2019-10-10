<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationFeature extends Model
{
    protected $fillable=['application','feature'];

    public function rel_to_apps()
    {
        return $this->hasOne('App\Application','id','application');
    }
}
