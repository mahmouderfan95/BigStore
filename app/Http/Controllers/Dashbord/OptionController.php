<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\optionRequest;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
class OptionController extends Controller
{
    public function index(){
        $options = Option::with(['product','attribute'])->get();
        return view('dashbord.options.index',compact('options'));
    }
    public function create(){
        try{
            $attributes = Attribute::select('id')->get();
            $products = Product::select('id')->get();
            return view('dashbord.options.create',compact('attributes','products'));
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }

    }

    public function store(optionRequest $request){
        try{
            DB::beginTransaction();
            $optionsCreate = Option::create([
                'product_id'    => $request->product_id,
                'attribute_id'  => $request->attribute_id,
                'price'         => $request->price
            ]);
            $optionsCreate->name = $request->name;
            $optionsCreate->save();
            DB::commit();
            return redirect()->route('options.index')->with(['success' => 'تمت الاضافه بنجاح']);
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }

    }
    public function edit($id){
        try{
            $option = Option::find($id);
            $attributes = Attribute::select('id')->get();
            $products = Product::select('id')->get();
            if(!$option){
                return redirect()->back()->with(['error' => 'هذه الخاصيه غير موجوده']);
            }
            return view('dashbord.options.edit',compact('option','attributes','products'));
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }

    }
    public function update($id,optionRequest $request){
        try{
            DB::beginTransaction();
            $option = Option::find($id);
            if(!$option){
                return redirect()->back()->with(['error' => 'هذه الخاصيه غير موجوده']);
            }
            $option->update($request->only(['price','product_id','attribute_id']));
            $option->name = $request->name;
            $option->save();
            DB::commit();
            return redirect()->route('options.index')->with(['success'=>'تم التحديث بنجاح']);
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }
    }
    public function destroy($id){
        try{
            $option = Option::find($id);
            if(!$option){
                return redirect()->back()->with(['error' => 'هذه الخاصيه غير موجوده']);
            }
            $option->delete();
            return redirect()->route('options.index')->with(['success' => 'تم الحذف بنجاح']);
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك خطأ يرجى المحاوله مره اخرى']);
        }
    }
}
