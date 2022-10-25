<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodSubCategory extends Model
{
    use HasFactory, CrudTrait;
     
    /**database table with field */
    protected $table = 'food_sub_categories';
    protected $primaryKey = 'food_sub_category_id';
 
    protected $fillable = [
        'food_category_id',
        'food_sub_category_name',
        'food_sub_category_body',
        'food_sub_category_slug',
    ];

    /**food sub category relestion */
     public function foodCategory()
     {
         return $this->belongsTo(FoodCategory::class, 'food_category_id', 'food_category_id');
     }
}
