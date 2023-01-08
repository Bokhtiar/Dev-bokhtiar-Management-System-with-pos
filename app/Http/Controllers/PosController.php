<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Traits\Network\ProductNetwork;
use Illuminate\Http\Request;

class PosController extends Controller
{
    use ProductNetwork;
    /**
     * post create
     */ 
    public function create(){
        $carts = Cart::item_cart();
        $users = User::where('role_id', 1)->get();
        $products = $this->ProductActiveList();
        $cart_item_number = Cart::total_item_cart();
        return view('modules.pos.create', compact('products', 'carts','cart_item_number', 'users'));
    }
}
