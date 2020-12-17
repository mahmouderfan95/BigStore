<?php

namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;
    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];
    protected $fillable = ['parient_id','slug','is_active'];
    protected $hidden = ['created_at','updated_at'];

    public function ScopeParent($q){
        return $q->whereNull('parient_id');
    }
    public function ScopeChild($q){
        return $q->whereNotNull('parient_id');
    }

    public function getActive(){
        return $this->is_active == 1 ? 'مفعل ': 'غير مفعل';
    }

    public function _parent(){
        return $this->belongsTo(self::class , 'parient_id');
    }

    public function children(){
        return $this->hasMany(self::class,'parient_id');
    }
    public function products()
    {
        return $this->belongsToMany('App\Models\Product','product_categories');
    }
}
