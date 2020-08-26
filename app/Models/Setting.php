<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use Translatable;
    protected $with = ['translations'];
    protected $translatedAttributes = ['value'];
    protected $fillable = ['key','is_translatable','plane_value'];

    public static function setMany($setting){
        foreach($setting as $key=>$value){
            self::set($key,$value);
        }
    }

    public static function set($key,$value){
        if($key === 'translatable'){
            return static::setTranslatableSetting($value);
        }
        if(is_array($value)){
            $value = json_encode($value);
        }
        static::updateOrCreate(['key'=>$key,'plane_value'=>$value]);
    }
    public static function setTranslatableSetting($setting = []){
        foreach($setting as $key=>$value){
            static::updateOrCreate(['key'=>$key],[
                'is_translatable' => true,
                'value'   => $value
            ]);
        }
    }
}
