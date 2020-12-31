<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\attributeRequest;
use Illuminate\Http\Request;
use App\Models\Attribute;
use Illuminate\Support\Facades\DB;
class attributeController extends Controller
{
    public function index(){
        $attributes = Attribute::paginate(PAGINATE_COUNT);
        return view('dashbord.attribute.index',compact('attributes'));
    }

    public function create(){
        return view('dashbord.attribute.create');
    }

    public function store(attributeRequest $request){
        try{
            DB::beginTransaction();
            $attr = Attribute::create();
            $attr->name = $request->name;
            $attr->save();
            DB::commit();
            return redirect()->route('attribute.index')->with(['success' => 'تم الاضافه بنجاح']);
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }
    }

    public function edit($id){
        try{
            $attr = Attribute::find($id);
            if($attr){
                return view('dashbord.attribute.edit',compact('attr'));
            }
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }
    }

    public function update($id,attributeRequest $request){
        try{

            DB::beginTransaction();
            $attr = Attribute::find($id);
            if(!$attr){
                return redirect()->back()->With(['error' => 'هذه الخاصيه غير موجوده']);
            }

            $attr->name = $request->name;
            $attr->save();
            DB::commit();
            return redirect()->route('attribute.index')->with(['success' => 'تم التحديث بنجاح']);
        }
        catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }
    }

    public function destroy($id){
        try{
            $attr = Attribute::find($id);
            if(!$attr){
                return redirect()->back()->with(['هذه الخاصيه غير موجوده']);
            }

            $attr->delete();
            return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);
        }

        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }
    }
}
