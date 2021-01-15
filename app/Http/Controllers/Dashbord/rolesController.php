<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\roleRequest;
use Illuminate\Http\Request;
use App\Models\Role;

class rolesController extends Controller
{
    public function index(){
        $roles = Role::get();
        return view('dashbord.roles.index',compact('roles'));
    }
    public function create(){
        return view('dashbord.roles.create');
    }

    public function store(roleRequest $request){
        // return $request;
        try{
            $roleCreate = Role::create([
                'name' => $request->name,
                'permissions'   => json_encode($request->permissions),
            ]);
            if($roleCreate){
                return redirect()->route('roles.index')->with(['success','تمت الاضافه بنجاح']);
            }
        }catch(\Exception $ex){
            return redirect()->back()->with(['error'=>'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }


    }
    public function edit($id){
        try{
            $role = Role::findOrFail($id);
            return view('dashbord.roles.edit',compact('role'));
        }catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }

    }
    public function update($id,Request $request){
        try{
            $role = Role::findOrFail($id);
            $role->name = $request->name;
            $role->permissions = json_encode($request->permissions);
            $role->save();
            return redirect()->route('roles.index')->with(['success','تم التحديث بنجاح']);
        }catch(\Exception $ex){
            return redirect()->back()->With(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }
    }
}
