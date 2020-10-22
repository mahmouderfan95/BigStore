<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\productGeneralRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public function index(){

    }

    public function create(){
        $data = [];
         $data['brands'] = Brand::where('is_active',1)->select('id')->get();
        $data['categories'] = Category::where('is_active',1)->select('id')->get();
        $data['tags'] = Tag::select('id')->get();
        return view('dashbord.product.general.create',$data);
    }

    public function store(productGeneralRequest $request){
        try{
            DB::beginTransaction();
            if($request->has('is_active'))
            $request->add(['is_active' => 1]);
        else
            $request->add(['is_active' => 0]);

        $product = Product::create([
            'slug' => $request->slug,
            'brand_id' => $request->brand_id,
            'is_active' => $request->is_active,
        ]);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->save();

        $product->categories()->attach($request->categories);
        DB::commit();
        return redirect()->back()->with(['success' => 'تم اضافه المنتج بنجاح']);
        // $product->tags()->attach($request->tags);
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }


    }
}
