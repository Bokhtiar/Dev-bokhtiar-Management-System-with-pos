<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory, CrudTrait;

    /**database table with field */
    protected $table = 'food_categories';
    protected $primaryKey = 'food_category_id';

    protected $fillable = [
        'food_category_name',
        'food_category_body',
        'food_category_slug',
        'food_category_parent_id',
    ];
} 
