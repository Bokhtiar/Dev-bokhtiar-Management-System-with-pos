<?php
namespace App\Traits\Network;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

trait OrderNetwork
{
    /**list of resource*/
    public function OrdertList()
    {
        return Order::latest()->get();
    }

    /**store resource */
    public function AleartStore($request)
    {
        $order = new Order();
        $order->user_id = $request->user_id;
        $order->payment = $request->payment;
        $order->total_amount = $request->total_amount;
        $order->created_by = Auth::id();
        $order->save();
        foreach (Cart::item_cart() as $cart) {
            $cart['order_id']=$order->id;
            $cart->save();
        }
    }

    /**single resource show */
    public function OrderFindById($id)
    {
        return Order::find($id);
    }

}
