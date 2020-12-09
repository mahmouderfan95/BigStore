<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class siteController extends Controller
{
    public function homepage(){
        $products = Product::get();
        return view('site.home',compact('products'));
    }
}
