<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Translatable;

    protected $fillable = ['is_active'];
    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];
    protected $hidden = ['created_at','updated_at'];

    public function getActive(){
        return $this->is_active == 1 ? 'مفعل' : 'غير مفعل';
    }
    public function getPhotoAttribute($val){
        return ($val !== null) ? asset('assets/upload/brands/' . $val) : "";
    }
}
