<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->require();
            $table->string('nick_name')->nullable();
            $table->string('phone')->require();
            $table->string('email')->unique()->require();
            $table->string('dob')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_contact_number')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_contact_number')->nullable();
            $table->string('local_guardian_name')->nullable();
            $table->string('local_guardian_number')->nullable();
            $table->string('address')->nullable();
            $table->string('national_id')->nullable();
            $table->string('blood_group')->nullable();

            $table->string('varsity_name')->nullable();
            $table->string('student_id')->nullable();
            $table->string('department')->nullable();
            $table->string('section')->nullable();

            $table->string('role_id')->default(4);
            $table->string('profile_image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
