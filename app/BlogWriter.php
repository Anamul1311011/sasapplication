<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogWriter extends Model
{
    protected $fillable=['name','image','description'];
}
