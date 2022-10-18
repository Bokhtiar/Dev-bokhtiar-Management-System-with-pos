<?php 
namespace App\Traits\Network;

use App\Models\Category;

trait CategoryNetwork
{
    /**list resource*/
    public function CategoryList(){
        return Category::latest()->get(['category_id', 'category_name', 'status']);
    }

    /**store resource */
    public function CategoryStoreOrUpdate($request){
        return Category::create([
            'category_name' => $request->category_name,
            'category_body' => $request->category_body,
        ]);
    }

    /**single resource show */
    public function CategoryShowOrEdit($category_id){
        return Category::find($category_id);
    }

    

}