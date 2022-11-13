<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
        $carts = Cart::item_cart();
        $cart_item_number = Cart::total_item_cart();
        return view('modules.pos.create', compact('products', 'carts','cart_item_number'));
    }
}
