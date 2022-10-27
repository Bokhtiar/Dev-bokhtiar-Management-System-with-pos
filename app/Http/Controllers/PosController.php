<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosController extends Controller
{
    /**
     * post create
     */
    public function create(){
        return view('modules.pos.create');
    }
}
