<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
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
        $data['products'] = Product::get();
        $data['categories'] = Category::Parent()->select('id','slug')->with(['children'=>function($q){
            $q->select('id','slug','parient_id');
            $q->with(['children' => function($qq){
                $qq->select('id','slug','parient_id');
                $qq->with(['children' => function($qqq){
                    $qqq->select('id','slug','parient_id');
                }]);
            }]);
        }])->get();

        $data['product'] = Product::where('slug',$slug)->first();
        if(!$data['product']){

        }
        $product_id = $data['product']->id;
        $categories_id = $data['product']->categories->pluck('id');
        $data['product_attributes'] = Attribute::whereHas('options',function($q) use($product_id){
            $q->whereHas('product',function($qq) use($product_id){
                $qq->where('product_id',$product_id);
            });
        })->get();
        $data['related_products'] = Product::whereHas('categories',function($cat) use($categories_id){
            $cat->whereIn('categories.id',$categories_id);
        })->limit(20)->latest()->get();
        return view('site.producDetails',$data);
    }
}
