<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bed_assigns', function (Blueprint $table) {
            $table->id('bed_assign_id');
            $table->integer('bed_id')->require();
            $table->integer('room_id')->require();
            $table->integer('user_id')->require();
            $table->integer('category_id')->require();
            $table->longText('bed_body')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('bed_assigns');
    }
}
