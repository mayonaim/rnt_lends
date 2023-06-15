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
            $table->unsignedBigInteger('supervisor_id')->nullable();
            $table->unsignedBigInteger('asset_id');
            $table->string('activity');
            $table->timestamp('start_timestamp');
            $table->timestamp('end_timestamp')->nullable();
            $table->integer('amount_borrowed')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected', 'borrowing', 'finished'])->default('pending');
            $table->timestamps();
            $table->foreign('borrower_id')->references('id')->on('borrowers')->onDelete('cascade');
            $table->foreign('supervisor_id')->references('id')->on('supervisors')->onDelete('set null');
            $table->foreign('asset_id')->references('id')->on('assets')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('borrow_requests');
    }
}
