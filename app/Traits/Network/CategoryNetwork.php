<?php 
namespace App\Traits\Network;

use App\Models\Category;

trait CategoryNetwork
{
    /**list Category*/
    public function CategoryList(){
        return Category::latest()->get(['category_id', 'category_name', 'status']);
    }

    /**active category */
    public function CategoryActiveList(){
        return Category::latest()->Active()->get(['category_id', 'category_name', 'status']);
    }

    /**store Category */
    public function CategoryStore($request){
        return Category::create([
            'category_name' => $request->category_name,
            'category_body' => $request->category_body,
        ]);
    }

    /**single Category show */
    public function CategoryFindById($category_id){
        return Category::find($category_id);
    }

    /**Category update */
    public function CategoryUpdate($request, $category_id){
        $category = Category::find($category_id);
        return $category = $category->update([
            'category_name' => $request->category_name,
            'category_body' => $request->category_body,
        ]);
    }
    

}