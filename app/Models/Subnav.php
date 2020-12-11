<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subnav extends Model
{
    protected $table = 'subnavs';

    public function navbar()
    {
        return $this->hasOne('App\Models\Navbar','id','navbar_id')->withDefault(['subname'=>null,'url'=>null]);
    }
}
