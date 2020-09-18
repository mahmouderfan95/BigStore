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

    public function getActive(){
        return $this->is_active == 1 ? 'مفعل ': 'غير مفعل';
    }
}
