<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\Network\RoomNetwork;
use App\Traits\Network\CategoryNetwork;
use App\Http\Requests\RoomValidationRequest;

class RoomController extends Controller
{
    use RoomNetwork, CategoryNetwork;

    /**room create and list  */
    public function index()
    {
        try {
            $categories = $this->CategoryList();
            $rooms = $this->RoomList();
            return view('modules.room.index', compact('categories', 'rooms'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**room store */
    public function store(RoomValidationRequest $request)
    {
        try {
            DB::beginTransaction();
            $room = $this->RoomStore($request);
            if (!empty($room)) {
                DB::commit();
                return redirect()->route('room.index')->with('success', 'Room Created successfully!');
            }
            throw new \Exception('Invalid About Information');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', "Something went wrong");
        }
    }

    /**room details information */
    public function show($room_id)
    {
        try {
            $show = $this->RoomFindById($room_id);
            return view('modules.room.show', compact('show'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**room edit */
    public function edit($room_id)
    {
        try {
            $edit = $this->RoomFindById($room_id);
            $categories = $this->CategoryList();
            $rooms = $this->RoomList();
            return view('modules.room.index', compact('edit', 'categories', 'rooms'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**room update */
    public function update(RoomValidationRequest $request, $room_id)
    {
        try {
            DB::beginTransaction();
            $room = $this->RoomUpdate($request, $room_id);
            if (!empty($room)) {
                DB::commit();
                return redirect()->route('room.index')->with('success', 'Room Updated successfully!');
            }
            throw new \Exception('Invalid About Information');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', "Something went wrong");
        }
    }

    /**room destroy */
    public function destroy($room_id)
    {
        try {
            $this->RoomFindById($room_id)->delete();
            return redirect()->route('room.index')->with('success', 'Room Deleted successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**room status */
    public function status($room_id)
    {
        try {
            $room = Room::find($room_id);
            Room::query()->Status($room); // crud trait
            return redirect()->route('room.index')->with('warning', 'Room Status Change successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**ajax auto suggest room_ways_bed */
    public function room_ways_bed(Request $request)
    {
        try {
            $results = Bed::query()->Active()->where('room_id', $request->room_id)->get();
            return response()->json([
                "status" => true,
                "data" => $results
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "message" => $th->getMessage(),
            ], 200);
        }
    }
}
