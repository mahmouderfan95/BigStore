<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model
{
    protected $fillable = ['name','locale','tag_id'];
    protected $hidden = ['created_at','updated_at'];
}
