<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandTraslation extends Model
{
    protected $fillable = ['brand_id','name','locale'];
    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];
    protected $hidden = ['created_at','updated_at'];
}
