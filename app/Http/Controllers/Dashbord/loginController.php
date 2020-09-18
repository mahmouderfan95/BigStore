<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\AdminLoginRequest;
use Illuminate\Http\Request;

class loginController extends Controller
{
    // function get login page //
    public function getLogin(){
        return view('dashbord.auth.login');
    }
    // function get login page //
    // function post login //
    public function postLogin(AdminLoginRequest $request){
        if(auth()->guard('admin')->attempt(['email' => $request->email,'password' => $request->password])){
            return redirect()->route('admin.dashbord')->with(['success' => 'تم تسجيل الدخول بنجاح']);
        }

        return redirect()->back()->with(['error' => 'هناك خطأ فى البيانات']);
    }
    // function post login //

    /* get dashbord page */
    public function getDashbordPage(){
        return view('dashbord.dashbord');
    }
    /* get dashbord page */
    public function logout(){
        $guard = $this->getGaurd();
        $guard->logout();
        return redirect()->route('admin.login');
    }
    private function getGaurd(){
        return auth()->guard('admin');
    }
}
