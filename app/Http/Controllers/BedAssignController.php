<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\BedAssign;
use App\Models\Category;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class BedAssignController extends Controller
{
    /** bed assing list show */
    public function index()
    {
        try {
            $bedAssigns = BedAssign::all();
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
            $beds = Bed::query()->Active()->get(['bed_id', 'bed_name']);
            $rooms = Room::query()->Active()->get(['room_id', 'room_name']);
            $categories = Category::query()->Active()->get(['category_id', 'category_name']);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
