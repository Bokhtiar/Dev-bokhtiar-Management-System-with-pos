<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Traits\Network\RoleNetwork;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    use RoleNetwork;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $permissions = Permission::all();
            return view('modules.permission.index', compact('permissions'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $roles = $this->RoleList();
            return view('modules.permission.createOrUpdate', compact('roles'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Permission::create($request->all());
            return redirect()->route('permission.index')->with('success', "Permission created");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $roles = $this->RoleList();
            $permission = Permission::where('id', $id)->first();
            return view('modules.permission.edit', compact('roles', 'permission'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            
            $permission = Permission::where('id', $id)->first();
             $permission->update($request->all());
            // $permission->role_id = $request->role_id;
            // $permission->permission = $request->permission;
            // $permission->save();
            return redirect()->route('permission.index')->with('success', "Permission updated");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
