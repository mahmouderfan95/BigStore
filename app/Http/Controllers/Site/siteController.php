<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class siteController extends Controller
{
    public function homepage(){
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
        $data['products'] = Product::get();
        return view('site.home',$data);
    }
}
