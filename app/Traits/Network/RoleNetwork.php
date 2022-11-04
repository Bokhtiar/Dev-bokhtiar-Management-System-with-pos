<?php 
namespace App\Traits\Network;

use App\Models\Role;

trait RoleNetwork
{
    /**list of resource*/
    public function RoleList(){
        return Role::latest()->get(['role_id','name','status']);
    }

    /**store resource database field*/
    public function ResourceStoreRole($request, $role=null){
        return array(
            'name' => $request->name,
        );
    }

    /**store resource */
    public function RoleStore($request){
        return Role::create($this->ResourceStoreRole($request));
    }

    /**single resource show */
    public function RoleFindById($role_id){
        return Role::find($role_id);
    }

    /**resource update */
    public function RoleUpdate($request, $role_id){
        $role = Role::find($role_id);
        return $role->update($this->ResourceStoreRole($request, $role));
    }
}