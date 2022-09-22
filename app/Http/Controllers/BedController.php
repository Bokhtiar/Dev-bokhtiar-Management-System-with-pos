<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BedController extends Controller
{
    /**bed list with bed create  */
    public function index()
    {
        try {
            $rooms = Room::query()->Active()->get(['room_id', 'room_name']);
            $beds = Bed::all();
            return view('modules.bed.index', compact('rooms', 'beds'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**bed store */
    public function store(Request $request)
    {
        $validated = Bed::query()->Validation($request->all());
        if ($validated) {
            try {
                DB::beginTransaction();
                $bed = Bed::create([
                    'bed_name' => $request->bed_name,
                    'room_id' => $request->room_id,
                    'bed_body' => $request->bed_body,
                ]);

                if (!empty($bed)) {
                    DB::commit();
                    return redirect()->route('bed.index')->with('success', 'Bed Created successfully!');
                }
                throw new \Exception('Invalid About Information');
            } catch (\Exception $ex) {
                DB::rollBack();
                return back()->with('error', "Something went wrong");
            }
        }
    }

    /**bed details  */
    public function show($bed_id)
    {
        try {
            $show = Bed::find($bed_id);
            return view('modules.bed.show', compact('show'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**bed edit */
    public function edit($bed_id)
    {
        try {
            $rooms = Room::query()->Active()->get(['room_id', 'room_name']);
            $beds = Bed::all();
            $edit = Bed::find($bed_id);
            return view('modules.bed.index', compact('rooms', 'beds', 'edit'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**bed update */

    /**bed store */
    public function Update(Request $request, $bed_id)
    {
        $validated = Bed::query()->Validation($request->all());
        if ($validated) {
            try {
                DB::beginTransaction();
                $update = Bed::find($bed_id);
                $bed = $update->update([
                    'bed_name' => $request->bed_name,
                    'room_id' => $request->room_id,
                    'bed_body' => $request->bed_body,
                ]);

                if (!empty($bed)) {
                    DB::commit();
                    return redirect()->route('bed.index')->with('success', 'Bed Updated Successfully!');
                }
                throw new \Exception('Invalid About Information');
            } catch (\Exception $ex) {
                DB::rollBack();
                return back()->with('error', "Something went wrong");
            }
        }
    }

    /**bed delete */
    public function destroy($bed_id)
    {
        try {
            Bed::find($bed_id)->delete();
            return redirect()->route('bed.index')->with('success', 'Bed Deleted Successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**bed status */
    public function status($bed_id)
    {
        try {
            $bed = Bed::find($bed_id);
            Bed::query()->Status($bed); // crud trait
            return redirect()->route('bed.index')->with('warning', 'Bed Status Change successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
