<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePICsTable extends Migration
{
    public function up()
    {
        Schema::create('people_in_charge', function (Blueprint $table) {
            $table->id('pic_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('people_in_charge');
    }
}
