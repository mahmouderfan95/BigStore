<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashbord\Shipping\UpdateShipping;
use App\Models\Setting;
use Exception;

class settingController extends Controller
{
    public function edit_shpping($type){
        if($type == 'free'){
            $shipping_method = Setting::where('key','free_shpping_lable')->first();
        }elseif($type == 'inner'){
            $shipping_method = Setting::where('key','local_lable')->first();
        }elseif($type == 'outer'){
            $shipping_method = Setting::where('key','outer_lable')->first();
        }else{
            $shipping_method = Setting::where('key','free_shpping_lable')->first();
        }
        return view('dashbord.settings.shipping_method',compact('shipping_method'));
    }

    public function update_shpping($id,UpdateShipping $request){
        try{
            $shipping = Setting::findOrFail($id);
            $shipping->update(['plane_value' => $request->plane_value]);
            $shipping->value = $request->value;
            $shipping->save();
            return redirect()->back()->with(['success' => 'تم تحديث بيانات التوصيل بنجاح']);
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error'=> 'هنا خطأ']);
        }

    }
}
