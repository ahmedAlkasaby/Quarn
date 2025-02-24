<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use Laratrust\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:roles-read')->only('index');
        $this->middleware('permission:roles-create')->only('store');
        $this->middleware('permission:roles-update')->only('update');
        $this->middleware('permission:roles-delete')->only('destroy');
    }

    public function index()
    {
        $roles=Role::where('name', '!=', 'admin')->get();
        $permissionsInDb = Permission::pluck('name')->toArray();
        $permissions=array_keys(config('laratrust_seeder.roles_structure.admin'));
        return view('admin.role.index',compact('roles','permissions','permissionsInDb'));

    }
    public function store(RoleRequest $request)
    {
        $request->validated();


        $role=Role::create([
            'name' => $request->name,
            'display_name' => $request->name,
            'description' => $request->name,
        ]);

        $role->syncPermissions($request->permissions);

        session()->flash('success',__('site.createRole'));

        return redirect()->route('roles.index');
    }







    public function update(RoleRequest $request, Role $role)
    {

        $request->validated();

        $role->update([
            'name' => $request->name,
            'display_name' => $request->name,
            'description' => $request->name,
        ]);

        $role->syncPermissions($request->permissions);

        session()->flash('success',__('site.updateRole'));
        return redirect()->route('roles.index');

    }
    public function destroy(Role $role){
        if($role->admins()->count() ==0){
            $role->delete();
            session()->flash('success',__('site.deleteRole'));
            return back();
        }else{
            session()->flash('error',__('site.can_not_delete_role'));
            return back();
        }
    }
}
