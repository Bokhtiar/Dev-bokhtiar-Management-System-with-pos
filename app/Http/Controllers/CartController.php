<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        if(Cart::where('product_id',$id)->where('order_id',null)->where('user_id',Auth::id())->first()){
            $update = cart::where('product_id',$id)->where('order_id',null)->first();
            $update['quantity']=$update->quantity + 1;
            $update->save();


            /* product dicrement */
            $product = Product::find($id);
            $product->quantity = $product->quantity - 1;
            $product->save();


            return back()->with('success', 'Product quantity updated.');
        }else{
            cart::create([
                'user_id'=> Auth::id(),
                'product_id'=> $id,
            ]);

            /* product dicrement */
            $product = Product::find($id);
            $product->quantity = $product->quantity - 1;
            $product->save();
            
            return redirect()->back()->with('success', 'Product Added.');
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
    public function update($id)
    {
        try {
            $cart = Cart::find($id);
            $cart->quantity = $cart->quantity + 1;
            $cart->save();

            /* product dicrement */
            $product = Product::find($cart->product_id);
            $product->quantity = $product->quantity - 1;
            $product->save();


            return redirect()->back()->with('success', 'Cart updated');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function increment($id){
        try {
            $cart = Cart::find($id);
            $cart->quantity = $cart->quantity + 1;
            $cart->save();

            /* product dicrement */
            $product = Product::find($cart->product_id);
            $product->quantity = $product->quantity - 1;
            $product->save();


            return redirect()->back()->with('success', 'Cart quantity updated');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function decrement($id)
    {
        try {
            $cart = Cart::find($id);
            $cart->quantity = $cart->quantity - 1;
            $cart->save();

            /* product dicrement */
            $product = Product::find($cart->product_id);
            $product->quantity = $product->quantity + 1;
            $product->save();


            return redirect()->back()->with('success', 'Cart quantity updated');
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
            Cart::find($id)->delete();
            return redirect()->back()->with('success', 'Cart item deleted');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
