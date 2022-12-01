<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    /**Account Settings */
    public function account_setting()
    {
        try {
            $roles = Role::all();
            $user = Auth::user();
            return view('setting.account_setting', compact('user', 'roles'));
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    /**account update */
    public function account_update(Request $request)
    {
        $user = User::find(Auth::id());
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'role_id' => Auth::user()->role_id,
            'profile_image' => $request->profile_image,
            'guardian_name' => $request->guardian_name,
            'guardian_phone' => $request->guardian_phone,
        ]);
       return back();
    }

    /**account profile */
    public function profile()
    {
        try {
            $user = User::find(Auth::id());
            return view('setting.profile', compact('user'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**logouts */
    public function logouts()
    {
        Auth::logout();
        return redirect('/');
    }
}
