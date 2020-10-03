<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\tags\tagsRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function index(){
        try{
            $tags = Tag::paginate(PAGINATE_COUNT);
        return view('dashbord.tags.index',compact('tags'));
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }
    }

    public function create(){
        return view('dashbord.tags.create');
    }

    public function store(tagsRequest $request){
        try{
            DB::beginTransaction();
            $tagCreate = Tag::create($request->only('slug'));
            $tagCreate->name = $request->name;
            $tagCreate->save();
            DB::commit();
            return redirect()->route('tags.index')->with(['success' => 'تم الاضافه بنجاح']);
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك خطأ ما يرجى المحاوله مره اخرى']);
        }
    }

    public function edit($id){
        try{
            $tag = Tag::findOrFail($id);
            if(!$tag){
                return redirect()->back()->with(['error' => 'هذه العلامه غير موجوده']);
            }
            return view('dashbord.tags.edit',compact('tag'));
        }
        catch(\Exception $ex){
            return redirect()->back(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }
    }

    public function update($id,tagsRequest $request){
        try{
            $tag = Tag::findOrFail($id);
            if(!$tag){
                return redirect()->back()->with(['error' => 'هذه العلامه غير موجوده']);
            }
            DB::beginTransaction();
            $tag->update($request->except(['_token','id']));
            $tag->name = $request->name;
            $tag->save();
            DB::commit();
            return redirect()->route('tags.index')->with(['success' => 'تم ألتحديث بنجاح']);
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }
    }

    public function destroy($id){
        try{
            $tag = Tag::findOrFail($id);
            if(!$tag){
                return redirect()->back()->with(['error' => 'هذه العلامه غير موجوده']);
            }

        $tag->delete();
        return redirect()->route('tags.index')->with(['success' => 'تم الحذف بنجاح']);
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }
    }
}
