<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    protected $fillable = ['name','email','password','role_id'];
    protected $hidden = ['password','created_at','updated_at'];

    public function role(){
        return $this->belongsTo('App\Models\Role','role_id');
    }
}
