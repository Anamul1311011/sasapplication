<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public function rel_to_categories()
    {
        return $this->hasOne('App\FaqCategory','id','category');
    }

    protected $fillable=['category','icon','torq','description'];
}
