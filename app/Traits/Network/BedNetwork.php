<?php 
namespace App\Traits\Network;

use App\Models\Bed;

trait BedNetwork
{ 
    /**list resource*/
    public function BedList(){
        return Bed::all();
    }

    /**Active resource */
    public function BedActiveList(){
        return Bed::latest()->Active()->get();
    }

    /**store resource */
    public function BedStore($request){
        return Bed::create([
            'bed_name' => $request->bed_name,
            'room_id' => $request->room_id,
            'bed_body' => $request->bed_body,
        ]);
    }

    /**single resource show */
    public function BedFindById($bed_id){
        return Bed::find($bed_id);
    }

    /**resource update */
    public function BedUpdate($request, $bed_id){
        $bed = Bed::find($bed_id);
        return $bed->update([
            'bed_name' => $request->bed_name,
            'room_id' => $request->room_id,
            'bed_body' => $request->bed_body,
        ]);
    }
    
}