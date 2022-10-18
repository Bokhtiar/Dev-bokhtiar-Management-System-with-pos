<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\BedAssign;
use App\Models\Category;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

        $validated = BedAssign::query()->Validation($request->all());
        if ($validated) {
            try {
                DB::beginTransaction();
                $bedAssign = BedAssign::create([
                    'room_id' => $request->room_id,
                    'user_id' => $request->user_id,
                    'bed_id' => $request->bed_id,
                    'category_id' => $request->category_id,
                    'bed_assing_body' => $request->bed_assing_body,
                    'user_id' => $request->user_id,
                ]);

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
