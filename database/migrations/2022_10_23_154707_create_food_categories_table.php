<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_categories', function (Blueprint $table) {
            $table->id('food_category_id');
            $table->tinyInteger('status')->default(0);
            $table->string('food_category_slug')->unique();
            $table->string('food_category_name')->unique();
            $table->string('food_category_body')->nullable();
            $table->unsignedBigInteger('food_category_parent_id')->nullable();
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
        Schema::dropIfExists('food_categories');
    }
}
