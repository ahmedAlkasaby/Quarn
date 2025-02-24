<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\Role;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admins-read')->only('index');
        $this->middleware('permission:admins-create')->only('create');
        $this->middleware('permission:admins-create')->only('store');
        $this->middleware('permission:admins-update')->only('edit');
        $this->middleware('permission:admins-update')->only('update');
        $this->middleware('permission:admins-delete')->only('destroy');
    }

    public function index(){
        $authUser=auth()->user()->id;
        $admins = Admin::where('id', '!=', $authUser)
        ->filter(request('search'))
        ->latest()
        ->skip(1)
        ->paginate(50);
        return view('admin.admin.index',compact('admins'));
    }

    public function create(){
        $roles=Role::all();
        return view('admin.admin.create',compact('roles'));
    }

    public function store(AdminRequest $request){
        $request->merge(['password'=>bcrypt($request->password)]);
        $admin=Admin::create($request->all());
        $role=Role::find($request->role_id);
        $admin->addRole($role);
        return redirect()->route('admins.index')->with('success',__('site.CreateSucessfully'));
    }

    public function edit(Admin $admin){
        $roles=Role::all();
        return view('admin.admin.edit',compact('admin','roles'));
    }

    public function update(AdminRequest $request,Admin $admin){
        $data=$request->except('password');
        if($request->filled('password')){
            $data['password']=bcrypt($request->password);
        }
        $admin->update($data);
        $role=Role::find($request->role_id);
        $admin->syncRoles([$role]);
        return redirect()->route('admins.index')->with('success',__('site.UpdateSucessfully'));
    }




    public function destroy(Admin $admin){
        $admin->delete();
        return redirect()->route('admins.index')->with('success',__('site.DeleteSuccessfully'));
    }

    public function changeLang(){
        $auth=auth()->user();
        $admin=Admin::find($auth->id);
        $admin->update([
            'lang'=>$admin->lang=='ar'?'en':'ar'
        ]);
        return back();
    }
}
