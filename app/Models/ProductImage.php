<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = ['product_id','photo'];
    protected $hidden = ['created_at','updated_at'];

    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
