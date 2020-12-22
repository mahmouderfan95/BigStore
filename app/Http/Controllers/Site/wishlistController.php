<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class wishlistController extends Controller
{
    public function store(Request $request){
        if(! auth()->user()->wishlistHas($request->productId)){
            auth()->user()->wishlists()->attach($request->productId);
            return response()->json([
                'wished'    => true,
                'status'    => true,
            ]);
        }
        return response()->json([
            'wished'    => false,
            'status'    => false,
        ]);
    }

    public function destroy(Request $request){
        auth()->user()->wishlists()->detach($request->productId);
        return response()->json([
            'wishedDelete'  => true,
            'status'        => true,
        ]);
    }
    public function index(){
        try{
            $wishlistsUser = auth()->user()->wishlists()->latest()->get();
            $products = Product::get();
            $categories = Category::get();
            return view('site.wishlists.index',compact('wishlistsUser','products','categories'));
        }
        catch(\Exception $ex){

        }


    }
}
