<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function AdminUpdatePassword(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
            'new_password_confirmation' => 'required',

        ]);

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            $notification = array(
                'message' => 'Current Password Not Match!',
                'alert-type' => 'error'
            );
            return back()->with($notification);

        }
        $id = Auth::user()->id;
        User::where('id', $id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password Change Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);

    }

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.admin_profile_view', compact('profileData'));
    }

    public function AdminDashboard(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.index');
    }

    public function AdminchangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    }

    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function AdminLogin()
    {
        return view('admin.admin_login');
    }


    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path("upload/admin_images/" . $data->photo));
            $filename = rand() . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();
        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);



    }

}
