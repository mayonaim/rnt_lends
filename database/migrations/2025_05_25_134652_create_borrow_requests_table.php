<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('borrow_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('borrower_id');
            $table->unsignedBigInteger('supervisor_id');
            $table->unsignedBigInteger('asset_id');
            $table->integer('amount_borrowed');
            $table->timestamp('start_timestamp');
            $table->timestamp('end_timestamp')->nullable();
            $table->string('description');
            $table->string('status');
            $table->timestamps();
            $table->foreign('borrower_id')->references('id')->on('borrowers');
            $table->foreign('supervisor_id')->references('id')->on('supervisors');
            $table->foreign('asset_id')->references('id')->on('assets');
        });
    }

    public function down()
    {
        Schema::dropIfExists('borrow_requests');
    }
}
