<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use Translatable;
    protected $guarded = [];
    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];
    protected $hidden = ['created_at','updated_at'];

    public function options(){
        return $this->hasMany('App\Models\Option','attribute_id');
    }

}
