<?php

namespace App\Http\Controllers;

use App\Http\Requests\BedAssignValidationRequest;
use App\Models\Bed;
use App\Models\BedAssign;
use App\Models\Category;
use App\Models\Room;
use App\Models\User;
use App\Traits\Network\BedAssignNetwork;
use App\Traits\Network\BedNetwork;
use App\Traits\Network\CategoryNetwork;
use App\Traits\Network\RoomNetwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BedAssignController extends Controller
{
    use BedAssignNetwork, CategoryNetwork, RoomNetwork, BedNetwork;

    /** bed assing list show */
    public function index()
    {
        try {
            $bedAssigns = $this->BedAssignList();
     
            return view('modules.bedAssign.index', compact('bedAssigns'));
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
            $beds = $this->BedActiveList();
            $rooms = $this->RoomActiveList();
            $categories = $this->CategoryActiveList();
            $users = User::query()->Active()->where('role_id', 1)->get(['id', 'name']);
            return view('modules.bedAssign.createOrUpdate', compact('beds', 'rooms', 'categories', 'users'));
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
    public function store(BedAssignValidationRequest $request)
    {
        try {

            $bed = BedAssign::where('user_id', $request->user_id)->first();
            if($bed){
                return redirect()->route('bed-assign.index')->with('success', 'Already Bed Assign ');
            }else{

               // dd($request->all());

                $room_id = $request->room_id;
                $room = Room::find($room_id);
                $category = $room->category->category_name;

                /* check available seat */
                if ($category == "Single seat") {
                    $bed = BedAssign::where('room_id', $request->room_id)->where('bed_id', $request->bed_id)->get();
                    if (count($bed) == 2) {
                        return redirect()->route('bed-assign.index')->with('warning', 'Single already has assign 2 student!');
                    }
                    $bedAssign = $this->BedAssignStore($request);
                } else {
                    if (BedAssign::where('room_id', $request->room_id)->where('bed_id', $request->bed_id)->first()) {
                        return redirect()->route('bed-assign.index')->with('warning', 'Full room already has assign!');
                    }
                    $bedAssign = $this->BedAssignStore($request);
                }


                
            }
            
            if (!empty($bedAssign)) {
                DB::commit();
                return redirect()->route('bed-assign.index')->with('success', 'Bed Assign Created successfully!');
            }
            throw new \Exception('Invalid About Information');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', "Something went wrong");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($bed_assign_id)
    {
        try {
            $show = $this->BedAssignFindById($bed_assign_id);
            return view('modules.bedAssign.show', compact('show'));
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
    public function edit($bed_assign_id)
    {
        try {
            $edit = $this->BedAssignFindById($bed_assign_id);
            $beds = $this->BedActiveList();
            $rooms = $this->RoomActiveList();
            $categories = $this->CategoryActiveList();
            $users = User::query()->Active()->where('role_id', 1)->get(['id', 'name']);
            return view('modules.bedAssign.createOrUpdate', compact('beds', 'rooms', 'categories', 'users', 'edit'));
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
    public function update(BedAssignValidationRequest $request, $bed_assign_id)
    {
        try {
            DB::beginTransaction();
            $bedAssign = $this->BedAssignUpdate($request, $bed_assign_id);
            if (!empty($bedAssign)) {
                DB::commit();
                return redirect()->route('bed-assign.index')->with('success', 'Bed Assign Created successfully!');
            }
            throw new \Exception('Invalid About Information');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', "Something went wrong");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($bed_assign_id)
    {
        $this->BedAssignFindById($bed_assign_id)->delete();
        return redirect()->back()->with('danger', 'Bed assign deleted successfully');
    }


     /**status active or inactive */
    public function status($id)
    {
        try {
            $bedAssign = BedAssign::find($id);
            BedAssign::query()->Status($bedAssign); // crud trait
            return back()->with('warning', 'Bill Status Change successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
  
    /** user information */
    public function bed_assing_user_inof($id)
    {
        $user = BedAssign::with('user')->with('room')->with('bed')->find($id);
        return response()->json($user, 200);
    }
}
