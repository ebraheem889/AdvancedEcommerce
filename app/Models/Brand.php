<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Translatable;

    protected $fillable = ['is_active', 'photo'];
    protected $casts = [
        'is_active' => 'boolean'
    ];

    public $translatedAttributes = ['name'];

    protected $with = ['translations'];
    public function getPhotoAttribute($val){

        return ($val!== null) ? asset('assets/images/brands/' .$val):"";

    }
    public function getIsActiveAttribute($value)
    {
        return $value === 1 ? 'مفعل' : 'غير مفعل';
    }
}
