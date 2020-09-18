<?php

namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{


    protected $fillable = ['name','category_id','locale'];
    protected $hidden = ['created_at','updated_at'];
}
