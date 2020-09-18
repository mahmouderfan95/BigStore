<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Dashbord\UpdatemainCategoryRequest;

class mainCategoriesController extends Controller
{
    public function index(){
        $categories = Category::Parent()->paginate(PAGINATE_COUNT);
        return view('dashbord.maincategories.index',compact('categories'));
    }
    public function edit($id){
        $category = Category::find($id);
        if(!$category){
            return redirect()->back()->with(['error' => 'هذا القسم غير موجود']);
        }
        return view("dashbord.maincategories.edit",compact('category'));
    }

    public function update($id,UpdatemainCategoryRequest $request){
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
}
