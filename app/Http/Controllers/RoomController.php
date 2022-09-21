<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    /**room create and list  */
    public function index()
    {
        try {
            $categories = Category::get(['category_id', 'category_name']);
            $rooms = Room::get(['room_id', 'room_name', 'room_charge', 'category_id', 'status']);
            return view('modules.room.index', compact('categories', 'rooms'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**room store */
    public function store(Request $request)
    {
        $validated = Room::query()->Validation($request->all());
        if ($validated) {
            try {
                DB::beginTransaction();
                $room = Room::create([
                    'room_name' => $request->room_name,
                    'room_charge' => $request->room_charge,
                    'category_id' => $request->category_id,
                    'room_body' => $request->room_body,
                ]);

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
    }

    /**room details information */
    public function show($room_id)
    {
        try {
            $show = Room::find($room_id);
            return view('modules.room.show', compact('show'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**room edit */
    public function edit($room_id)
    {
        try {
            $edit = Room::find($room_id);
            $categories = Category::get(['category_id', 'category_name']);
            $rooms = Room::get(['room_id', 'room_name', 'room_charge', 'category_id', 'status']);
            return view('modules.room.index', compact('edit', 'categories', 'rooms'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**room update */
    public function update(Request $request, $room_id)
    {
        $validated = Room::query()->Validation($request->all());
        if ($validated) {
            try {
                DB::beginTransaction();
                $update = Room::find($room_id);
                $room = $update->update([
                    'room_name' => $request->room_name,
                    'room_charge' => $request->room_charge,
                    'category_id' => $request->category_id,
                    'room_body' => $request->room_body,
                ]);

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
    }

    /**room destroy */
    public function destroy($room_id)
    {
        try {
            Room::find($room_id)->delete();
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
}
