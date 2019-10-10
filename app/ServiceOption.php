<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceOption extends Model
{
    protected $fillable=['service','option'];

    public function rel_to_services()
    {
        return $this->hasOne('App\Service','id','service');
    }
}
