<?php 
namespace App\Traits\Network;

use Illuminate\Support\Str;
use App\Models\FoodSubCategory;

trait FoodSubCategoryNetwork
{
    /**list of resource*/
    public function FoodSubCategoryList(){
        return FoodSubCategory::latest()->get(['food_category_id', 'food_category_name', 'status']);
    }

    /**active resource */
    public function FoodSubCategoryActiveList(){
        return FoodSubCategory::latest()->Active()->get(['food_category_id', 'food_category_name', 'food_category_parent_id', 'status']);
    }

     /**store resource database field*/
     public function ResourceStore($request){
        return array(
            'food_category_id' => $request->food_category_id,
            'food_sub_category_body' => $request->food_sub_category_body,
            'food_sub_category_name' => $request->food_sub_category_name,
            'food_sub_category_slug' =>  Str::slug($request->food_sub_category_name, '-'),  
        );
    }

    /**store resource */
    public function FoodSubCategoryStore($request){
        return FoodSubCategory::create($this->ResourceStore($request));
    }

    /**single resource show */
    public function FoodSubCategoryFindById($food_sub_category_id){
        return FoodSubCategory::find($food_sub_category_id);
    }

    /**resource update */
    public function FoodSubCategoryUpdate($request, $food_sub_category_id){
        $food_sub_category = FoodSubCategory::find($food_sub_category_id);
        return $food_sub_category->update($this->ResourceStore($request));
    }
}