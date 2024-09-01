<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function AllPermission()
    {
        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission', compact('permissions'));
    }

    public function AddPermission()
    {
        return view('backend.pages.permission.add_permission');
    }

    public function StorePermission(Request $request)
    {

        $permission = Permission::create([
            'name' => $request->permission_name,
            'group_name' => $request->group_name,

        ]);

        $notification = [
            'message' => 'Permission Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.permission')->with($notification);

    }

    public function DeletePermission($id)
    {
        Permission::findOrFail($id)->delete();


        $notification = [
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function EditPermission($id)
    {
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission', compact('permission'));
    }

    public function UpdatePermission(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->update([
            'name' => $request->permission_name,
            'group_name' => $request->group_name,
        ]);
        $notification = [
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('all.permission')->with($notification);
    }

    ////////////////////////////////////////

    public function AllRole()
    {
        $roles = Role::all();
        return view('backend.pages.role.all_role', compact('roles'));
    }

    public function AddRole()
    {
        return view('backend.pages.role.add_role');
    }

    public function StoreRole(Request $request)
    {

        $request->validate([
            'role_name' => 'required',
        ]);

        Role::create([
            'name' => request('role_name'),
        ]);
        $notification = [
            'message' => 'Role Added Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('all.role')->with($notification);
    }

    public function EditRole($id)
    {
        $role = Role::findOrFail($id);
        return view('backend.pages.role.edit_role', compact('role'));
    }

    public function UpdateRole(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->role_name,
        ]);
        $notification = [
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('all.role')->with($notification);
    }

    public function DeleteRole($id)
    {
        $role = Role::findOrFail($id)->delete();
        $notification = [
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('all.role')->with($notification);
    }

    //////////////////////////////////////////// Authrization

    public function AddRolePermission()
    {
        $role = Role::all();
        $permission = Permission::all();
        $permission_group = User::getPermissionGroups();
        return view('backend.rolesetup.add_role_permission', compact('role', 'permission', 'permission_group'));
    }

    public function StoreRolePermission(Request $request){
       $data = array();
       $permission = $request->permission;

       foreach($permission as $item){
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;
            DB::table('role_has_permissions')->insert($data);
       }

        $notification = [
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success'
            ];
            return redirect()->route('all.role.permission')->with($notification);

    }

    public function AllRolePermission(){
        $role = Role::all();
        return view('backend.rolesetup.all_role_permission', compact('role'));
    }
    public function DeleteRolePermission($id){
        $role = Role::findOrFail($id);
        $role->permissions()->detach();
        $notification = [
            'message' => 'Role Permission Deleted Successfully',
            'alert-type' => 'success'
            ];
            return redirect()->back()->with($notification);
    }

    public function EditRolePermission($id){
        $role = Role::findOrFail($id);
        $permission = Permission::all();
        $permission_group = User::getPermissionGroups();
        return view('backend.rolesetup.edit_role_permission', compact('role', 'permission','permission_group'));
    }

    public function UpdateRolePermission(Request $request ,$id){
        $role = Role::findOrFail($id);
        $permission = $request->permission;

        if (!empty($permission)) {
            $validPermissions = Permission::whereIn('id', $permission)->get();
            $role->syncPermissions($validPermissions);
        }


        $notification = [
            'message' => 'Role Permission Updated Successfully',
            'alert-type' => 'success'
            ];
            return redirect()->route('all.role.permission')->with($notification);

    }






}
