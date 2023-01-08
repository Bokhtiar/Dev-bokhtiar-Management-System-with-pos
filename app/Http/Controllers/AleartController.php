<?php

namespace App\Http\Controllers;

use App\Http\Requests\AleartValidation;
use App\Models\Aleart;
use App\Traits\Network\AleartNetwork;
use Illuminate\Http\Request;

class AleartController extends Controller
{
    use AleartNetwork;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        try {
            $alearts = $this->AleartList();
            return view('modules.aleart.index', compact('alearts'));
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
    public function store(AleartValidation $request)
    {
        try {
            $this->AleartStore($request);
            return redirect()->route('alert.index')->with('success', 'Alert created successfully done');
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
            $show = $this->AleartFindById($id);
            return view('modules.aleart.show', compact('show'));
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
            $alearts = $this->AleartList();
            $edit = $this->AleartFindById($id);
            return view('modules.aleart.index', compact('alearts', 'edit'));
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
        try {
            $this->AleartUpdate($request, $id);
            return redirect()->route('alert.index')->with('success', 'Alert Updeted successfully done');
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
            $this->AleartFindById($id)->delete();
            return redirect()->back()->with('success', 'Alert Successfully Done.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**status active or inactive */
    public function status($id)
    {
        try {
            $alert = Aleart::find($id);
            Aleart::query()->Status($alert); // crud trait
            return back()->with('warning', 'Aleart Status Change successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
