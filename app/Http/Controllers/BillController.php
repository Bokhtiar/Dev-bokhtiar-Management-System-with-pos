<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillValidation;
use App\Models\BedAssign;
use App\Models\Bill;
use App\Traits\Network\BedAssignNetwork;
use App\Traits\Network\BillNetwork;
use Illuminate\Http\Request;

class BillController extends Controller
{
    use BillNetwork;
    use BedAssignNetwork;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $bills = $this->BillList();
            $bedAssigns = $this->BedAssignActiveList();
            return view('modules.bill.index', compact('bedAssigns', 'bills'));
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
    public function store(BillValidation $request)
    {
        try {
            $this->BillStore($request);
            return redirect()->route('bill.index')->with('success', 'Bill Created Successsfully');
        } catch (\Throwable $th) {
            throw $th;
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
        try {
            $show = $this->BillFindById($id);
            return view('modules.bill.show', compact('show'));
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
    public function edit($id)
    {
        try {
            $bills = $this->BillList();
            $edit = $this->BillFindById($id);
            $bedAssigns = $this->BedAssignActiveList();
            return view('modules.bill.index', compact('bedAssigns', 'edit', 'bills'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BillValidation $request, $id)
    {
        try {
            $this->BillUpdate($request, $id);
            return redirect()->route('bill.index')->with('success', 'Bill Updated Successsfully');
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->BillFindById($id)->delete();
            return redirect()->route('bill.index')->with('success', 'Bill Deleted Successsfully');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

     /**status active or inactive */
    public function status($id)
    {
        try {
            $bill = Bill::find($id);
            Bill::query()->Status($bill); // crud trait
            return redirect()->route('bill.index')->with('warning', 'Bill Status Change successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
