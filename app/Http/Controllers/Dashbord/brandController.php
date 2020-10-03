<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\brandRequest;
use App\Http\Requests\Dashbord\brands\BrandRequest as BrandsBrandRequest;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
class brandController extends Controller
{
    public function index(){
        try{
            $brands = Brand::paginate(PAGINATE_COUNT);
            return view('dashbord.brands.index',compact('brands'));
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }

    }

    public function create(){
        return view('dashbord.brands.create');
    }

    public function store(brandRequest $request){
        try{
            DB::beginTransaction();
            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);
            $fileName = "";
            if ($request->has('photo')) {
                $fileName = uploadImage('brands', $request->photo);
            }
            $brand = Brand::create($request->except('_token', 'photo'));

            //save translations
            $brand->name = $request->name;
            $brand->photo = $fileName;
            $brand->save();
            DB::commit();
            return redirect()->route('brands.index')->with(['success' => 'تم ألاضافة بنجاح']);
        }
        catch(\Exception $ex){
            return redirect()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }




    }

    public function edit($id){
        try{
            $brand = Brand::findOrFail($id);
            if(!$brand){
                return redirect()->back()->with(['error' => 'هذا الماركه غير موجوده']);
            }
            return view('dashbord.brands.edit',compact('brand'));
        }
        catch(\Exception $ex){
            return redirect()->with(['error' => 'هذه الماركه غير موجوده']);
        }
    }

    public function update($id,BrandRequest $request){
        try{
            $brand = Brand::find($id);
            if (!$brand)
                return redirect()->route('admin.brands')->with(['error' => 'هذا الماركة غير موجود']);
            DB::beginTransaction();
            if ($request->has('photo')) {
                $fileName = uploadImage('brands', $request->photo);
                Brand::where('id', $id)
                    ->update([
                        'photo' => $fileName,
                    ]);
            }

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $brand->update($request->except('_token', 'id', 'photo'));

            //save translations
            $brand->name = $request->name;
            $brand->save();

            DB::commit();
            return redirect()->route('admin.brands')->with(['success' => 'تم ألتحديث بنجاح']);

        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }

    }

    public function destroy($id){
        try{
            $brand = Brand::findOrfail($id);
            if(!$brand){
                return redirect()->back()->with(['error' => 'هذه الماركه غير موجوده']);
            }

            $brand->delete();
            return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);

        }

        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك خطأ ما يرجى المحاوله مره اخرى ']);
        }
    }
}
