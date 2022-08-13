<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->enum('status',array('pending','accepted','rejected','completed','canceled','accept_canceled'));
            $table->decimal('paid_price')->default(0);
            $table->boolean('paid')->default(true);
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('offer_id')->references('id')->on('offers')->onDelete('cascade');
            $table->boolean('active')->default(true);
            $table->softDeletes();

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
        Schema::dropIfExists('books');
    }
}
