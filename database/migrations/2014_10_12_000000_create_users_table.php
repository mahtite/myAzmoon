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
            $table->string('name');
            $table->boolean('is_admin')->default(0);
            $table->date('t_tavalod');
            $table->string('codemelli');
            $table->enum('twofactortype',['off','sms']);
            $table->string('phone');
            $table->string('email');
            $table->tinyInteger('sex');
            $table->string('username');
           // $table->integer('state');
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states')->cascadeOnDelete();


            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnDelete();

            $table->timestamp('email_verified_at')->nullable();
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
