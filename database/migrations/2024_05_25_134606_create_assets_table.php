<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('pic_id');
            $table->string('category');
            $table->integer('stock');
            $table->timestamps();

            $table->foreign('pic_id')->references('id')->on('people_in_charge');
        });
    }

    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
