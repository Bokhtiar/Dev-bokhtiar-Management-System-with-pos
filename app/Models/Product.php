<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, CrudTrait;
    
    /**database table with field */
    protected $table = 'products';
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'name',
        'body',
        'price',
        'image',
        'food_category_id',
        'food_sub_category_id',
    ];

    /**category reletion */
    public function foodCategory()
    {
        return $this->belongsTo(FoodCategory::class, 'food_category_id', 'food_category_id');
    }

    public function foodSubCategory()
    {
        return $this->belongsTo(FoodSubCategory::class, 'food_sub_category_id', 'food_sub_category_id');
    }
} 
