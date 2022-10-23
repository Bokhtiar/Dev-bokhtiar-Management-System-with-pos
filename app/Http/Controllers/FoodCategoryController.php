<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodCategoryValidationRequest;
use App\Models\FoodCategory;
use App\Traits\Network\FoodCategoryNetwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodCategoryController extends Controller
{
    use FoodCategoryNetwork;

    /** list of resource */
    public function index()
    {
        try {
            $foodCategories = $this->FoodCategoryList();
            return view('modules.foodCategory.index', compact('foodCategories'));
        } catch (\Throwable $th) {
            return redirect()->route('food-category')->with('warning', 'Something went wrong');
        }
    }

    /** store of resource */
    public function store(FoodCategoryValidationRequest $request)
    {
        try {
            DB::beginTransaction();
            $food_category = $this->FoodCategoryStore($request);
            if (!empty($food_category)) {
                DB::commit();
                return redirect()->route('food-category.index')->with('success', 'Food Category Created successfully!');
            }
            throw new \Exception('Invalid About Information');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', "Something went wrong");
        }
    }

    /** list of resource */
    public function show($food_category_id)
    {
        try {
            $show = $this->FoodCategoryFindById($food_category_id);
            return view('modules.foodCategory.show', compact('show'));
        } catch (\Throwable $th) {
            return redirect()->route('food-category.index')->with('warning', 'Something went wrong!');
        }
    }
    
    /** list of resource */
    public function edit($food_category_id)
    {
        try {
            $foodCategories = $this->FoodCategoryList();
            $edit = $this->FoodCategoryFindById($food_category_id);
            return view('modules.foodCategory.show', compact('foodCategories', 'edit'));
        } catch (\Throwable $th) {
            return redirect()->route('food-category.index')->with('warning', 'Something went wrong!');
        }
    }
    
    /** list of resource */
    public function update(FoodCategoryValidationRequest $request, $food_category_id)
    {
        try {
            DB::beginTransaction();
            $food_category = $this->FoodCategoryUpdate($request, $food_category_id);
            if (!empty($food_category)) {
                DB::commit();
                return redirect()->route('food-category.index')->with('success', 'Food Category Updated successfully!');
            }
            throw new \Exception('Invalid About Information');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', "Something went wrong");
        }
    }
    
    /** list of resource */
    public function destroy($food_category_id)
    {
        try {
            $this->FoodCategoryFindById($food_category_id)->delete();
            return redirect()->route('food-category.index')->with('success', 'Food category deleted successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', "Something went wrong");
        }
    }

    /**status active or inactive */
    public function status($food_category_id)
    {
        try {
            $food_category = FoodCategory::find($food_category_id);
            FoodCategory::query()->Status($food_category); // crud trait
            return redirect()->route('food-category.index')->with('warning', 'Food Category Status Change successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', "Something went wrong");
        }
    }
}
