<?php 
namespace App\Traits\Network;

use App\Models\Category;
use App\Models\FoodCategory;

trait FoodCategoryNetwork
{
    /**list of resource*/
    public function FoodCategoryList(){
        return FoodCategory::latest()->get(['food_category_id', 'food_category_name', 'food_category_parent_id', 'status']);
    }

    /**food parentcategory  */
    public function FoodParentCategoryList(){
        return FoodCategory::where('food_category_parent_id', !null)->latest()->get(['food_category_id', 'food_category_name', 'food_category_parent_id', 'status']);
    }

    /**active resource */
    public function FoodCategoryActiveList(){
        return FoodCategory::latest()->Active()->get(['food_category_id', 'food_category_name', 'food_category_parent_id', 'status']);
    }

     /**store resource database field*/
     public function ResourceStore($request){
        return array(
            'food_category_name' => $request->food_category_name,
            'food_category_body' => $request->food_category_body,
            'food_category_parent_id' => $request->food_category_parent_id,
        );
    }


    /**store resource */
    public function FoodCategoryStore($request){
        return FoodCategory::create($this->ResourceStore($request));
    }

    /**single resource show */
    public function FoodCategoryFindById($food_category_id){
        return FoodCategory::find($food_category_id);
    }

    /**resource update */
    public function FoodCategoryUpdate($request, $food_category_id){
        $food_category = FoodCategory::find($food_category_id);
        return $food_category->update($this->ResourceStore($request));
    }
    

}