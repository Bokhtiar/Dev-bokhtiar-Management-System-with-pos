<?php 
namespace App\Traits\Network;

use App\Models\BedAssign;

trait BedAssignNetwork
{ 
    /**list resource*/
    public function BedAssignList(){
        return BedAssign::all();
    }

    /**Active resource */
    public function BedAssignActiveList(){
        return BedAssign::latest()->Active()->get();
    }

    /**store resource database field*/
    public function ResourceStore($request){
        return array(
            'room_id' => $request->room_id,
            'user_id' => $request->user_id,
            'bed_id' => 2,
            'category_id' => $request->category_id,
            'bed_assing_body' => $request->bed_assing_body,
        );
    }


    /**store resource */
    public function BedAssignStore($request){
        return BedAssign::create($this->ResourceStore($request));
    }

    /**single resource show */
    public function BedAssignFindById($bed_assign_id){
        return BedAssign::find($bed_assign_id);
    }

    /**resource update */
    public function BedAssignUpdate($request, $bed_assign_id){
        $bedAssign = BedAssign::find($bed_assign_id);
        return $bedAssign->update($this->ResourceStore($request));
    }
    
}