<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetImagesTable extends Migration
{
    public function up()
    {
        Schema::create('asset_images', function (Blueprint $table) {
            $table->id('image_id');
            $table->string('name');
            $table->unsignedBigInteger('asset_id');
            $table->timestamps();

            $table->foreign('asset_id')->references('asset_id')->on('assets');
        });
    }

    public function down()
    {
        Schema::dropIfExists('asset_images');
    }
}
