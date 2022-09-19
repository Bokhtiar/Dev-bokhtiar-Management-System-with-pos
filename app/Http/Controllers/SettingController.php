<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**Account Settings */
    public function account_setting()
    {
        try {
            $user = Auth::user();
            return view('setting.account_setting', compact('user'));
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    /**account update */
    public function account_update(Request $request)
    {
        try {
            $user = User::find(Auth::id());
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address1 = $request->address1;
            $user->address2 = $request->address2;
            $user->save();
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;

        }
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
