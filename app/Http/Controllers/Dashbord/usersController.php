<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\adminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Role;
class usersController extends Controller
{
    public function index(){
        $users = Admin::latest()->where('id','<>',auth()->id())->get();
        return view('dashbord.users.index',compact('users'));
    }

    public function create(){
        $roles = Role::get();
        return view('dashbord.users.create',compact('roles'));
    }

    public function store(adminRequest $request){
        try{
            $adminCreate = Admin::create([
                'name'  => $request->name,
                'email' => $request->email,
                'password'  => bcrypt($request->password),
                'role_id'   => $request->role_id
            ]);
            return redirect()->route('users.index')->with(['success' => 'تمت الاضافه بنجاح']);
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }


    }

}
