<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Category extends Model implements TranslatableContract
{
    use Translatable;
    protected $fillable=['parent_id','slug','is_active'];

    protected $with = ['translations'];
    protected $translatedAttributes  = ['name'];

    protected $hidden=['translations'];
    protected $casts=['is_active' =>'boolean'];
}
