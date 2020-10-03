<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandTranslation extends Model
{
    protected $fillable = ['brand_id','name','locale'];

    protected $hidden = ['created_at','updated_at'];
}
