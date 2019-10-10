<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UniqueServiceFeature extends Model
{
    protected $fillable=['service','feature'];

    public function rel_to_services()
    {
        return $this->hasOne('App\UniqueService','id','service');
    }
}
