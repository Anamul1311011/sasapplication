<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable=['name','designation','image','description','f_icon','f_link','l_icon','l_link','t_icon','t_link'];
}
