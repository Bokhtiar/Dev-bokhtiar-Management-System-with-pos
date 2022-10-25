<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodSubCategoryValidationRequest;
use App\Models\FoodSubCategory;
use App\Traits\Network\FoodCategoryNetwork;
use App\Traits\Network\FoodSubCategoryNetwork;
use Illuminate\Support\Facades\DB;

class FoodSubCategoryController extends Controller
{
    use FoodSubCategoryNetwork, FoodCategoryNetwork;

     /** list of resource */
     public function index()
     {
         try {
             $foodCategories = $this->FoodCategoryList();
             $foodSubCategories = $this->FoodSubCategoryList();
             return view('modules.foodSubCategory.index', compact('foodCategories','foodSubCategories'));
         } catch (\Throwable $th) {
             return redirect()->route('food-sub-category.index')->with('warning', 'Something went wrong');
         }
     }
 
     /** store of resource */
     public function store(FoodSubCategoryValidationRequest $request)
     {
         try {
             DB::beginTransaction();
             $food_sub_category = $this->FoodSubCategoryStore($request);
             if (!empty($food_sub_category)) {
                 DB::commit();
                 return redirect()->route('food-sub-category.index')->with('success', 'Food Sub Category Created successfully!');
             }
             throw new \Exception('Invalid About Information');
         } catch (\Exception $ex) {
             DB::rollBack();
             return back()->with('error', "Something went wrong");
         }
     }
 
     /** list of resource */
     public function show($food_sub_category_id)
     {
         try {
             $show = $this->FoodSubCategoryFindById($food_sub_category_id);
             return view('modules.foodSubCategory.show', compact('show'));
         } catch (\Throwable $th) {
             return redirect()->route('food-sub-category.index')->with('warning', 'Something went wrong!');
         }
     }
     
     /** list of resource */
     public function edit($food_sub_category_id)
     {
         try {
            $foodCategories = $this->FoodCategoryList();
            $foodSubCategories = $this->FoodSubCategoryList();
            $edit = $this->FoodSubCategoryFindById($food_sub_category_id);
            return view('modules.foodSubCategory.index', compact('foodCategories', 'edit', 'foodSubCategories'));
         } catch (\Throwable $th) {
             return redirect()->route('food-sub-category.index')->with('warning', 'Something went wrong!');
         }
     }
     
     /** list of resource */
     public function update(FoodSubCategoryValidationRequest $request, $food_sub_category_id)
     {
         try {
             DB::beginTransaction();
             $food_sub_category = $this->FoodSubCategoryUpdate($request, $food_sub_category_id);
             if (!empty($food_sub_category)) {
                 DB::commit();
                 return redirect()->route('food-sub-category.index')->with('success', 'Food Sub Category Updated successfully!');
             }
             throw new \Exception('Invalid About Information');
         } catch (\Exception $ex) {
             DB::rollBack();
             return back()->with('error', "Something went wrong");
         }
     }
     
     /** list of resource */
     public function destroy($food_sub_category_id)
     {
         try {
             $this->FoodSubCategoryFindById($food_sub_category_id)->delete();
             return redirect()->route('food-sub-category.index')->with('success', 'Food Sub category deleted successfully!');
         } catch (\Throwable $th) {
             return back()->with('error', "Something went wrong");
         }
     }
 
     /**status active or inactive */
     public function status($food_sub_category_id)
     {
        try {
            $food_sub_category = FoodSubCategory::find($food_sub_category_id);
            FoodSubCategory::query()->Status($food_sub_category); // crud trait
            return redirect()->route('food-sub-category.index')->with('warning', 'Food Sub Category Status Change successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', "Something went wrong");
        }
     }
}
