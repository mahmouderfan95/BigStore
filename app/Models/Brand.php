<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['is_active'];
    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];
    protected $hidden = ['created_at','updated_at'];
}
