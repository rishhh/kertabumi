<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDetailkemeja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailkemejas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_kemeja');
            $table->string('ukuran');
            $table->integer('awal');
            $table->integer('masuk');
            $table->integer('keluar');
            $table->integer('akhir');
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
        Schema::dropIfExists('detailkemejas');
    }
}
