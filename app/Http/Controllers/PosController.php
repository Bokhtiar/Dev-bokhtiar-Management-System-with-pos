<?php

namespace App\Http\Controllers;

use App\Traits\Network\ProductNetwork;
use Illuminate\Http\Request;

class PosController extends Controller
{
    use ProductNetwork;
    /**
     * post create
     */
    public function create(){
        $products = $this->ProductActiveList();
        return view('modules.pos.create', compact('products'));
    }
}
