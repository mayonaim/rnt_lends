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
            $table->unsignedBigInteger('pic_id')->nullable();
            $table->string('category');
            $table->integer('stock');
            $table->string('images')->nullable();
            $table->timestamps();
            $table->foreign('pic_id')->references('id')->on('people_in_charge')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
