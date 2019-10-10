<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HostingFeature extends Model
{
    public function rel_to_hostings()
    {
        return $this->hasOne('App\Hosting','id','hosting');
    }


    protected $fillable=['hosting','feature'];
}
