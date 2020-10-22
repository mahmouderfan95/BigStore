<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Translatable,
    SoftDeletes;
    protected $with = ['translations'];
    protected $fillable = [
        'slug',
        'price',
        'special_price',
        'special_price_type',
        'special_price_start',
        'special_price_end',
        'selling_price',
        'sku',
        'mange_stock',
        'qty',
        'in_stock',
        'viewed',
        'is_active',
        'brand_id'
    ];

    protected $casts = [
        'mange_stock' => 'boolean',
        'in_stock' => 'boolean',
        'is_active' => 'boolean',
    ];
    protected $dates = [
        'special_price_start',
        'special_price_end',
        'deleted_at',
    ];

    protected $translatedAttributes = ['name','description','short_description'];

    public function brand(){
        return $this->belongsTo('App\Model\Brand','brand_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','product_categories');
    }
    public function getActive(){
        return $this->is_active == 1 ? 'مفعل' : 'غير مفعل';
    }



    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag','product_tags');
    }

}
