<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;


class Option extends Model
{
    use Translatable;

    protected $fillable = ['attribute_id', 'product_id', 'price'];

    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];

    //protected $hidden=['translations'];
    protected $casts = ['is_active' => 'boolean'];



    public function product()
    {

        return $this->belongsTo(product::class, 'product_id');
    }

    public function attribute()
    {

        return $this->belongsTo(attribute::class, 'attribute_id');
    }
}
