<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function productBySlug($slug){
        $data = [];
        $data['category'] = Category::where('slug',$slug)->first();
        if($data['category']){
             $data['products'] = $data['category']->products;
        }
        return view('site.products',$data);
    }
}
