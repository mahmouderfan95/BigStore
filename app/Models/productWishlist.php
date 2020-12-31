<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productWishlist extends Model
{
    protected $fillable = ['user_id','product_id'];

}
