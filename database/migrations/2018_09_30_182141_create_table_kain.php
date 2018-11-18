<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipe',25);
            $table->string('nama_kain',100);
            $table->string('supplier',25);
            $table->integer('stok')->unsigned();
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
        Schema::dropIfExists('kains');
    }
}
