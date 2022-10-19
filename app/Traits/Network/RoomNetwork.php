<?php

namespace App\Traits\Network;

use App\Models\Room;
use App\Models\Category;

trait RoomNetwork
{
    /**list of Room*/
    public function RoomList()
    {
        return Room::get(['room_id', 'room_name', 'room_charge', 'category_id', 'status']);
    }

    /**Active room list */
    public function RoomActiveList()
    {
        return Room::query()->Active()->get(['room_id', 'room_name']);
    }

    /**store resource */
    public function RoomStore($request)
    {
        return Room::create([
            'room_name' => $request->room_name,
            'room_charge' => $request->room_charge,
            'category_id' => $request->category_id,
            'room_body' => $request->room_body,
        ]);
    }

    /**single resource show */
    public function RoomFindById($room_id)
    {
        return Room::find($room_id);
    }

    /**resource update */
    public function RoomUpdate($request, $room_id)
    {
        $update = Room::find($room_id);
        return  $update->update([
                    'room_name' => $request->room_name,
                    'room_charge' => $request->room_charge,
                    'category_id' => $request->category_id,
                    'room_body' => $request->room_body,
                ]);
    }
}
