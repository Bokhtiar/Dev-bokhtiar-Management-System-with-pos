<?php

namespace App\Http\Controllers;

use App\Http\Requests\PassswrodChangeValidation;
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
        } catch (\Throwable$th) {
            throw $th;
        }
    }

    /**account update */
    public function account_update(Request $request)
    {
        $user = User::find(Auth::id());
        $user->update([
            'name' => $request->name,
            'nick_name' => $request->nick_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'dob' => $request->dob,
            'father_name' => $request->father_name,
            'father_contact_number' => $request->father_contact_number,
            'mother_name' => $request->mother_name,
            'mother_contact_number' => $request->mother_contact_number,
            'local_guardian_name' => $request->local_guardian_name,
            'local_guardian_number' => $request->local_guardian_number,
            'address' => $request->address,
            'national_id' => $request->national_id,
            'blood_group' => $request->blood_group,
            'varsity_name' => $request->varsity_name,
            'student_id' => $request->student_id,
            'department' => $request->department,
            'section' => $request->section,
            'password' => Hash::make($request->password),
            'role_id' => Auth::user()->role_id,
        ]);
        return back();
    }

    /**account profile */
    public function profile()
    {
        try {
            $user = User::find(Auth::id());
            return view('setting.profile', compact('user'));
        } catch (\Throwable$th) {
            throw $th;
        }
    }

    /* change password */
    public function change_password()
    {
        $users = User::where('role_id', 1)->get();
        return view('modules.change_password.create', compact('users'));
    }

    /* change password update */
    public function change_password_update(PassswrodChangeValidation $request)
    {
        if (Auth::user()->role_id == 1) {
            $hashedpassword = Auth::user()->password;
            if (Hash::check($request->old_password, $hashedpassword)) {
                if (!Hash::check($request->password, $hashedpassword)) {
                    $user = User::find(Auth::id());
                    $user->password = Hash::make($request->password);
                    $user->save();
                    Auth::logout();
                    return redirect()->route('login');
                } else {
                    return redirect()->route('/');
                }
            } else {

                return redirect()->route('/');
            }
        }
        $user = User::find($request->user_id);
        $hashedpassword = $user->password;
        if (Hash::check($request->old_password, $hashedpassword)) {
            if (!Hash::check($request->password, $hashedpassword)) {
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->route('login');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }

    }

    /**logouts */
    public function logouts()
    {
        Auth::logout();
        return redirect('/');
    }
}
