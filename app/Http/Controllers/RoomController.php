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
            $rooms = Room::get(['room_id', 'room_name', 'room_charge', 'category_id']);
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
}
