<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['photo'];
    protected $hidden = ['created_at','updated_at'];
    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset('assets/upload/sliders/' . $val) : "";
    }
}
