<?php

namespace App\Models;

use App\Option;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Translatable, SoftDeletes;

    protected $guarded = [];

    protected $with = ['translations'];
    protected $translatedAttributes = ['name', 'description', 'short_description'];


    protected $casts = [

        'manage_stock' => 'boolean',
        'in_stock' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected $dates = [
        'special_price_start',
        'special_price_end',
        'start_date',
        'end_date',
        'deleted_at',
    ];


    public function scopeActive($query)
    {

        return $query->where('is_active', 1);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class)->withDefault();
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }
    public function options()
    {
        return $this->hasMany(Option::class, 'product_id');
    }
}
