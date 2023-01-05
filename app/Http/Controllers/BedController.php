<?php

namespace App\Http\Controllers;

use App\Http\Requests\BedValidationRequest;
use App\Models\Bed;
use App\Models\BedAssign;
use App\Models\Room;
use App\Traits\Network\BedNetwork;
use App\Traits\Network\RoomNetwork;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BedController extends Controller
{
    use BedNetwork, RoomNetwork;

    /**bed list with bed create  */
    public function index()
    {
        try {
            $rooms = $this->RoomActiveList();
            $beds = $this->BedList();
            return view('modules.bed.index', compact('rooms', 'beds'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**bed store */
    public function store(BedValidationRequest $request)
    {
        try {
            
            DB::beginTransaction();

            $room_id = $request->room_id;
            $room = Room::find($room_id);
            $category = $room->category->category_name;
            
            /* check available seat */
            if ($category == "Single seat") {
                $bed = Bed::where('room_id', $request->room_id)->get();
                if (count($bed) == 2) {
                    return redirect()->route('bed.index')->with('warning', 'Single already has assign 2 student!');
                }
                $bed = $this->BedStore($request);
            } else {
                if (Bed::where('room_id', $request->room_id)->first()) {
                    return redirect()->route('bed.index')->with('warning', 'Full room already has assign!');
                }
                $bed = $this->BedStore($request);
            }
            
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

    /**bed details  */
    public function show($bed_id)
    {
        try {
            $show = $this->BedFindById($bed_id);
            return view('modules.bed.show', compact('show'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**bed edit */
    public function edit($bed_id)
    {
        try {
            $rooms = $this->RoomActiveList();
            $beds = $this->BedList();
            $edit = $this->BedFindById($bed_id);
            return view('modules.bed.index', compact('rooms', 'beds', 'edit'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**bed update */

    /**bed store */
    public function Update(Request $request, $bed_id)
    {
        try {
            DB::beginTransaction();
            $bed = $this->BedUpdate($request, $bed_id);
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

    /**bed delete */
    public function destroy($bed_id)
    {
        try {
            $this->BedFindById($bed_id)->delete();
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