<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductValidationRequest;
use App\Models\Product;
use App\Traits\Network\ProductNetwork;
use App\Traits\Network\FoodCategoryNetwork;
use App\Traits\Network\FoodSubCategoryNetwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use FoodCategoryNetwork, FoodSubCategoryNetwork, ProductNetwork; 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products = $this->ProductList();
            return view('modules.product.index', compact('products'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $foodCategories = $this->FoodCategoryActiveList();
            $foodSubCategories = $this->FoodSubCategoryActiveList();
            return view('modules.product.createOrUpdate', compact('foodCategories','foodSubCategories'));
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
    public function store(ProductValidationRequest $request)
    {
        try {
            DB::beginTransaction();
            $product = $this->ProductStore($request);
            if (!empty($product)) {
                DB::commit();
                return redirect()->route('product.index')->with('success', 'Product created successfully!');
            }
            throw new \Exception('Invalid About Information');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', "Something went wrong");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {
        try {
            $show = $this->ProductFindById($product_id);
            return view('modules.product.show', compact('show'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id)
    {
        try {
            $edit = $this->ProductFindById($product_id);
            $foodCategories = $this->FoodCategoryActiveList();
            $foodSubCategories = $this->FoodSubCategoryActiveList();
            return view('modules.product.createOrUpdate', compact('foodCategories','foodSubCategories', 'edit'));
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
    public function update(ProductValidationRequest $request, $product_id)
    {
        try {
            DB::beginTransaction();
            $product = $this->ProductUpdate($request, $product_id);
            if (!empty($product)) {
                DB::commit();
                return redirect()->route('product.index')->with('success', 'Product updated successfully!');
            }
            throw new \Exception('Invalid About Information');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', "Something went wrong");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        try {
            $this->ProductFindById($product_id)->delete();
            return redirect()->route('product.index')->with('success', 'Product deleted successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

     /**status active or inactive */
     public function status($product_id)
     {
         try {
             $product = $this->ProductFindById($product_id);
             Product::query()->Status($product); // crud trait
             return redirect()->route('product.index')->with('warning', 'Product ctatus change successfully!');
         } catch (\Throwable $th) {
             throw $th;
         }
     }
}
