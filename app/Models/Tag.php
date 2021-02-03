<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Translatable;
    protected $fillable = ['slug'];

    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];

}
