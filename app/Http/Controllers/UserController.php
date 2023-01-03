<?php

namespace App\Http\Controllers;

use App\Models\BedAssign;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**user create form */
    public function index()
    {
        try {
            $users = User::get(['id', 'name', 'email', 'phone', 'status']);
            $bedAssigns = BedAssign::orderBy('room_id', 'desc')->get();
            return view('modules.user.index', compact('users', 'bedAssigns'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**user create form */
    public function create()
    {
        try {
            $roles = Role::all();
            return view('modules.user.createOrUpdate', compact('roles'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**user store */
    public function store(Request $request)
    {
        $validated = User::query()->Validation($request->all());
        if ($validated) {
            try {
                DB::beginTransaction();
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'role_id' => $request->role_id,
                    'profile_image' => $request->profile_image,
                    'guardian_name' => $request->guardian_name,
                    'guardian_phone' => $request->guardian_phone,
                ]);

                if (!empty($user)) {
                    DB::commit();
                    return redirect()->route('user.index')->with('success', 'User Created successfully!');
                }
                throw new \Exception('Invalid About Information');
            } catch (\Exception $ex) {
                DB::rollBack();
                return back()->with('error', "Something went wrong");
            }
        }
    }

    /**user show */
    public function show($user_id)
    {
        try {
            $show = User::find($user_id);
            return view('modules.user.profile', compact('show'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**user delete */
    public function destroy($user_id)
    {
        try {
            User::find($user_id)->delete();
            return redirect()->route('user.index')->with('success', 'User deleted successfully!');
        } catch (\Throwable $th) {
            return redirect()->route('user.index')->with('error', 'Something went wrong!');
        }
    }

    /**status active or inactive */
    public function status($user_id)
    {
        try {
            $user = User::find($user_id);
            User::query()->Status($user); // crud trait
            return redirect()->route('user.index')->with('warning', 'User Status Change successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
