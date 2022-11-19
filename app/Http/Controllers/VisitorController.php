<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisitorVilidatorRequest;
use App\Models\User;
use App\Models\Visitor;
use App\Traits\Network\VisitorNetwork;

class VisitorController extends Controller
{
    use VisitorNetwork;

    public function index()
    {
        try {
            $visitors = $this->VisitorList();
            return view('modules.visitor.index', compact('visitors'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function create()
    {
        try {
            $users = User::where('role_id',4)->get();
            return view('modules.visitor.createUpdate', compact('users'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(VisitorVilidatorRequest $request)
    {
        try {
            $this->VisitorStore($request);
            return redirect()->route('visitor.index')->with('success', 'Visitor Created');
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    /**room status */
    public function status($id)
    {
        try {
            $visitor = Visitor::find($id);
            Visitor::query()->Status($visitor); // crud trait
            return redirect()->route('visitor.index')->with('warning', 'Visitor status change!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


}
