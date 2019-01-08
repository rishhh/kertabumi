<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKeranjang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->integer('kemeja_id')->unsigned();
            $table->foreign('kemeja_id')->references('id')->on('kemejas')->onDelete('cascade');
            $table->string('nama_kemeja',100);
            $table->string('uk');
            $table->integer('harga');
            $table->integer('qty');
            $table->integer('total_harga');
            $table->integer('status');
            $table->integer('kodeunik')->nullable();
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
        Schema::dropIfExists('keranjangs');
    }
}
