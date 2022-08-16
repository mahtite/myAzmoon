<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiveCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_codes', function (Blueprint $table) {
           $table->unsignedBigInteger('user_id');
           $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();

           $table->integer('code');
           $table->timestamp('expired_at');

           $table->unique(['user_id','code']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('active_codes');
    }
}
