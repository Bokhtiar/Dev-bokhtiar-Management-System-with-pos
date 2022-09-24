<?php

namespace App\Http\Controllers;

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
            $users = User::get(['name', 'email', 'phone', 'id']);
            return view('modules.user.index', compact('users'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**user create form */
    public function create()
    {
        try {
            $users = User::get(['name', 'email', 'phone', 'id']);
            return view('modules.user.index', compact('users'));
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
}
