<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;

class AddAdminController extends Controller
{


    public function AllAdmin()
    {

        $alladmin = User::where('role', 'admin')->get();
        return view('backend.pages.admin.all_admin', compact('alladmin'));
    }

    public function AddAdmin()
    {
        $roles = Role::all();
        return view('backend.pages.admin.add_admin', compact('roles'));
    }

    public function AddStore(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'password' => 'required|string|min:8',
            'role' => 'nullable|string',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'active';

        if ($request->roles) {
            $role = Role::find($request->roles); // استرجاع الدور باستخدام الرقم
            if ($role) {
                $user->assignRole($role->name); // تمرير اسم الدور
            }
        }


        $user->save();

        $notification = [
            'message' => 'Admin Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.admin')->with($notification);
    }

    public function DeleteAdmin($id)
    {
        $user = User::find($id)->delete();

        $notification = [
            'message' => 'Admin Deleted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('all.admin')->with($notification);

    }

    public function EditAdmin($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('backend.pages.admin.edit_admin', compact('user', 'roles'));
    }

    public function UpdateAdmin(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->status = 'active';
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $role = Role::find($request->roles); // استرجاع الدور باستخدام
            if ($role) {
                $user->assignRole($role->name); // تمرير اسم الدور
            }
        }
        $notification = [
            'message' => 'Admin Updated Successfully',
            'alert-type' => 'success'
            ];
            return redirect()->route('all.admin')->with($notification);
    }

}
