<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrontendFaq extends Model
{
    protected $fillable=['category','title','icon','description'];

    public function rel_to_categories()
    {
        return $this->hasOne('App\FrontendFaqCategory','id','category');
    }
}
