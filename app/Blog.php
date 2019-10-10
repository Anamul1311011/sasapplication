<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable=['category','writer','thumbnail','description'];

    public function rel_to_categories()
    {
        return $this->hasOne('App\BlogCategory','id','category');
    }

    public function rel_to_writers()
    {
        return $this->hasOne('App\BlogWriter','id','writer');
    }

    public function writerName(){
        return $this->belongsTo('App\BlogWriter','writer');
    }

    public function categoryName(){
        return $this->belongsTo('App\BlogCategory','category');
    }
}
