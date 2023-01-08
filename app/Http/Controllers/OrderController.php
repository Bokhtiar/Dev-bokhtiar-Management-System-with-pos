<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderValidation;
use App\Models\Cart;
use App\Traits\Network\OrderNetwork;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use OrderNetwork;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $orders = $this->OrdertList();
            return view('modules.order.index', compact('orders'));
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
    public function store(OrderValidation $request )
    {   
        try {
           return $this->OrderStore($request);
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
            $show = $this->OrderFindById($id);
            return view('modules.order.show', compact('show'));
        } catch (\Throwable $th) {
            //throw $th;
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
            $this->OrderFindById($id)->delete();
            return redirect()->back()->with('success', 'Order Deleted.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
