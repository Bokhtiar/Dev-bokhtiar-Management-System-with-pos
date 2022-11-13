<?php 
namespace App\Traits\Network;


use App\Models\Product;
use Intervention\Image\Facades\Image as Image;

trait ProductNetwork
{
    /**list of resource*/
    public function ProductList(){
        return Product::latest()->get(['product_id','name','image', 'quantity','price','food_category_id', 'status']);
    }

    /**list of active resource */
    public function ProductActiveList(){
        return Product::latest()->Active()->get(['product_id','name', 'quantity','image','price','food_category_id', 'food_sub_category_id', 'status']);
    }

    /**store resource database field*/
    public function ResourceStoreProduct($request, $product=null){
        
        if($request->hasFile('image')) {
            $image = Image::make($request->file('image'));
            $imageName = time().'-'.$request->file('image')->getClientOriginalName();
            $destinationPath = public_path('images/products/');
            $image->save($destinationPath.$imageName);      
        }else {
            $imageName= $product->image;
        }

        return array(
            'name' => $request->name,
            'image' => $imageName,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'body' => $request->body,
            'food_category_id' => $request->food_category_id,
            'food_sub_category_id' => $request->food_sub_category_id,
        );
       
    }



    /**store resource */
    public function ProductStore($request){
        return Product::create($this->ResourceStoreProduct($request));
    }

    /**single resource show */
    public function ProductFindById($product_id){
        return Product::find($product_id);
    }

    /**resource update */
    public function ProductUpdate($request, $product_id){
        $product = Product::find($product_id);
        return $product->update($this->ResourceStoreProduct($request, $product));
    }
    

}