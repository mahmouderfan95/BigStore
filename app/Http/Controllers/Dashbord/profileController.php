<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\profile\UpdateProfile;
use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function editProfile($id){
        try{
            $admin = Admin::findOrFail($id);
            return view('dashbord.profile.edit',compact('admin'));
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك خطأ ما يرجى المحاوله مره اخرى']);
        }

    }

    public function updateProfile($id,UpdateProfile $request){

        try{
            $admin = Admin::findOrFail($id);
            if($request->filled('password')){
                $request->merge(['password' => bcrypt($request->password)]);
            }
            unset($request['id']);
            // unset($request['password_confirmation']);
            $admin->update($request->all());
            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك خطأ ما يرجى المحاوله مره اخرى']);
        }
    }
}
