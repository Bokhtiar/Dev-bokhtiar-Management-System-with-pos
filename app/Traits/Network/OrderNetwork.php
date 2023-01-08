<?php
namespace App\Traits\Network;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

trait OrderNetwork
{
    /**list of resource*/
    public function OrdertList()
    {
        return Order::latest()->get();
    }

    /**store resource */
    public function OrderStore($request)
    {


        if(count(Cart::item_cart()) == 0) {
            return redirect()->back()->with('warning', 'Cart items empty');
        }

        foreach(Cart::item_cart() as $cart){
            if($cart->quantity == 0){
                return redirect()->back()->with('warning', 'Cart quantity is empty');
            }
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->time = $request->time;
        $order->total_amount = $request->total_amount;
        $order->created_by = Auth::id();
        $order->save();

        foreach (Cart::item_cart() as $cart) {
            $cart->order_id = $order->order_id;
            /* product dicrement */
            $product = Product::find($cart->product_id);
            $product->quantity = $product->quantity - $cart->quantity;
            $product->save();
            $cart->save();
        }

        return redirect()->back()->with('success', 'Order has been completed');
    }

    /**single resource show */
    public function OrderFindById($id)
    {
        return Order::find($id);
    }

}
