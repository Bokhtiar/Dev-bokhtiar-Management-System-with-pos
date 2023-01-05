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
                    'nick_name' => $request->nick_name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'dob' => $request->dob,
                    'father_name' => $request->father_name,
                    'father_contact_number' => $request->father_contact_number,
                    'mother_name' => $request->mother_name,
                    'monther_contact_name' => $request->monther_contact_name,
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
                    'role_id' => $request->role_id,
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
