<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('food_sub_categories', function (Blueprint $table) {
            $table->id('food_sub_category_id');
            $table->tinyInteger('status')->default(0);
            $table->integer('food_category_id')->require();
            $table->string('food_sub_category_name')->require();
            $table->longText('food_sub_category_body')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_sub_categories');
    }
}
