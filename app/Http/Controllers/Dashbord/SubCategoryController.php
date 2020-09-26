<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\Category\StoreSubCategories;
use Illuminate\Http\Request;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function index(){
        $categories = Category::Child()->paginate(PAGINATE_COUNT);
        return view('dashbord.subCategories.index',compact('categories'));
    }

    public function create(){
        $categories = Category::Parent()->get();
        return view('dashbord.subCategories.create',compact('categories'));
    }

    public function store(StoreSubCategories $request){
        try{
            if(!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $categoryCreate = Category::create($request->all());
            $categoryCreate->name = $request->name;
            $categoryCreate->save();
            // dd($categoryCreate);
            return redirect()->route('subCategories.index')->with(['success' => 'تمت اضافه القسم بنجاح']);
        }
        catch(\Exception $ex){
            return redirect()->back()->With(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }
    }

    public function edit($id){
        $subCategory = Category::findOrFail($id);
        if(!$subCategory){
            return redirect()->back()->with(['error' => 'هذا القسم غير موجود']);
        }
        $mainCategories = Category::Parent()->get();
        return view('dashbord.subCategories.edit',compact('subCategory','mainCategories'));
    }

    public function update($id,StoreSubCategories $request){
        try{
            if(!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);
            $category = Category::find($id);
            if(!$category){
                return redirect()->back()->with(['error' => 'هذا القسم غير موجود']);
            }

            $category->update($request->all());
            $category->name = $request->name;
            $category->save();
            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }
    }

    public function destroy($id){
        try{
            $subCategory = Category::findOrFail($id);
            if(!$subCategory){
                return redirect()->back()->with(['error','هذا القسم غير موجود']);
            }
            $subCategory->delete();
            return redirect()->back()->with(['success' => 'تم حذف القسم بنجاح']);
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }
    }
}
