<?php

namespace App\Models;

use App\Option;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use Translatable;


    public $translatedAttributes = ['name'];
    protected $guarded = [];
    protected $with = ['translations'];



    public function options()
    {

        return $this->hasMany(Option::class, 'attribute_id');
    }
}
