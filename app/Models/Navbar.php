<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
    protected $table = 'navbars';

    public function subnav()
    {
        return $this->belongsTo('App\Models\Subnav','navbar_id','id')->withDefault(['name'=>null,'url'=>null]);
    }
}
