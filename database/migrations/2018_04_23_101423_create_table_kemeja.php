<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKemeja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kemejas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kemeja',100);
            $table->integer('harga')->unsigned();
            $table->string('kategori',25);
            $table->integer('uk_s')->unsigned();
            $table->integer('uk_m')->unsigned();
            $table->integer('uk_l')->unsigned();
            $table->integer('uk_xl')->unsigned();
            $table->string('bahan',100);
            $table->text('keterangan');
            $table->string('file',100)->nullable();
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
        Schema::dropIfExists('kemejas');
    }
}
