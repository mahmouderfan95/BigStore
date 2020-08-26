<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
class settingController extends Controller
{
    public function edit_shpping($type){
        if($type == 'free'){
            $shipping_metod = Setting::where('key','free_shpping_lable')->first();
        }elseif($type == 'inner'){
            $shipping_metod = Setting::where('key','local_lable')->first();
        }elseif($type == 'outer'){
            $shipping_metod = Setting::where('key','outer_lable')->first();
        }else{
            $shipping_metod = Setting::where('key','free_shpping_lable')->first();
        }
        return view('dashbord.settings.shipping_method',compact('shipping_metod'));
    }
}
