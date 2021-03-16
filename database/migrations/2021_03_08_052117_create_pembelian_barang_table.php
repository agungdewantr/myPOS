<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian_barang', function (Blueprint $table) {
            $table->id('pbbID');
            $table->integer('PembelianID')->nullable();
            $table->integer('BarangID');
            $table->integer('SatuanID');
            $table->integer('Harga');
            $table->integer('Qty');
            $table->integer('Total');
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
        Schema::dropIfExists('pembelian_barang');
    }
}
