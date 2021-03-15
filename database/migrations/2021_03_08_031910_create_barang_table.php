<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id('BarangID');
            $table->integer('DiskonID')->nullable();
            $table->string('NamaBarang');
            $table->integer('Harga')->nullable();
            $table->integer('Satuan1')->nullable();
            $table->integer('Satuan2')->nullable();
            $table->float('Margin')->nullable();
            $table->string('Kode')->nullable();
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
        Schema::dropIfExists('barang');
    }
}
