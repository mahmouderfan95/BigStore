<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use Translatable;
    protected $fillable = ['attribute_id','product_id','price'];
    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];
    protected $hidden = ['created_at','updated_at'];
    public function attribute(){
        return $this->belongsTo('App\Models\Attribute','attribute_id');
    }
    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }

}
