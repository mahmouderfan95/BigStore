<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\sliderImages;
use App\Models\Slider;
use Illuminate\Http\Request;

class sliderController extends Controller
{
    public function addImages(){
        $images = Slider::get(['photo']);
        return view('dashbord.sliders.create',compact('images'));
    }

    public function SaveSliderImages(Request $request){
        $file = $request->file('dzfile');
        $filename = uploadImage('sliders', $file);

        return response()->json([
            'name' => $filename,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function SaveSliderDB(sliderImages $request){
        try{
            // save dropzone images
            if ($request->has('document') && count($request->document) > 0) {
                foreach ($request->document as $image) {
                    Slider::create([
                        'photo' => $image,
                    ]);
                }
            }

            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $ex) {

        }
    }
}
