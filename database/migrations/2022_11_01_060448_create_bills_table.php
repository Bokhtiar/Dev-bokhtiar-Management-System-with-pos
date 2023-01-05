<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id('bill_id');
            $table->integer('user_id')->require();
            $table->string('bed_assign_id')->require();
            $table->string('year')->require();
            $table->string('month')->require();
            $table->string('day')->require();
            $table->longText('bill_body')->nullable();
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
        Schema::dropIfExists('bills');
    }
}
