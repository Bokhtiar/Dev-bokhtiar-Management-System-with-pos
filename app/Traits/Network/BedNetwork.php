<?php 
namespace App\Traits\Network;

use App\Models\Bed;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

trait BedNetwork
{
    /**list resource*/
    public function resourceList(){
        return Bed::latest()->get(['category_id', 'category_name', 'status']);
    }

    /**store resource */
    public function resourceStore($request){
        return Category::create([
            'category_name' => $request->category_name,
            'category_body' => $request->category_body,
        ]);
    }

    /**single resource show */
    public function resourceFindById($category_id){
        return Category::find($category_id);
    }

    /**resource update */
    public function resourceUpdate($request, $category_id){
        $category = Category::find($category_id);
        return $category = $category->update([
            'category_name' => $request->category_name,
            'category_body' => $request->category_body,
        ]);
    }
    

}