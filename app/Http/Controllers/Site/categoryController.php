<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function productBySlug($slug){
        $data = [];
        $data['categories'] = Category::Parent()->select('id','slug')->with(['children'=>function($q){
            $q->select('id','slug','parient_id');
            $q->with(['children' => function($qq){
                $qq->select('id','slug','parient_id');
                $qq->with(['children' => function($qqq){
                    $qqq->select('id','slug','parient_id');
                }]);
            }]);
        }])->get();
        $data['category'] = Category::where('slug',$slug)->first();
        if($data['category']){
             $data['products'] = $data['category']->products;
        }
        return view('site.products',$data);
    }


    public function productDetails($slug){
        $data = [];
        $data['product'] = Product::where('slug',$slug)->first();
        return view('site.producDetails',$data);
    }
}
