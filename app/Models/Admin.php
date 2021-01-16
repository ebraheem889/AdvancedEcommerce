<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin  extends Authenticatable
{
    protected $guarded=[];
    public $timestamps=true;



    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
