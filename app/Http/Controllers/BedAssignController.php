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
            $users = User::query()->Active()->where('role_id', 4)->get(['id', 'name']);
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
        dd($request->all());
        try {
            DB::beginTransaction();
            $bedAssign = $this->BedAssignStore($request);
            if (!empty($bedAssign)) {
                DB::commit();
                return redirect()->route('bed-assign.index')->with('success', 'Bed Assign Created successfully!');
            }
            throw new \Exception('Invalid About Information');
        } catch (\Exception $ex) {
            dd($ex->getMessage());
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
            $users = User::query()->Active()->where('role_id', 4)->get(['id', 'name']);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
