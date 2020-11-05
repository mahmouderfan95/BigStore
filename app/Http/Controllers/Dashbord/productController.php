<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\productGeneralRequest;
use App\Http\Requests\dashbord\productPrice;
use App\Http\Requests\Dashbord\productStock;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public function index(){
        try{
            $products = Product::selection()->paginate(PAGINATE_COUNT);
            return view('dashbord.product.index',compact('products'));
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error','هاك مشكله ما يرجى المحاوله مره اخرى']);
        }
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

    public function getPrice($id){
        // $product = Product::findOrFail($id);
        return view('dashbord.product.price.create')->with(['id'=> $id]);
    }

    public function postPrice(productPrice $request){
        try{
            $product = Product::whereId($request->product_id)->update($request->except(['_token','product_id']));
            return redirect()->route('product.index')->with(['success' => 'تم التحديث بنجاح']);
        }
        catch(\Exception $ex){
            return redirect()->back(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }
    }

    public function getStock($id){
        // $product = Product::findOrFail($id);
        return view('dashbord.product.stock.create')->with(['id'=> $id]);
    }

    public function postStock(productStock $request){

            dd($request);
            $product = Product::whereId($request->product_id)->update($request->except(['_token','product_id']));
            return redirect()->route('product.index')->with(['success' => 'تم التحديث بنجاح']);

        // catch(\Exception $ex){
        //     return redirect()->back()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        // }


    }

    public function getImages($id){
        return view('dashbord.product.images.create')->with(['id' => $id]);
    }

    public function saveImages(Request $request){
        $file = $request->file('dzfile');
        $filename = uploadImage('products',$file);
        return response()->json([
            'name' => $filename,
            'original_name' => $file->getClientOriginalName()
        ]);
    }
    public function saveImageDB(Request $request){
        return $request;
    }
}
