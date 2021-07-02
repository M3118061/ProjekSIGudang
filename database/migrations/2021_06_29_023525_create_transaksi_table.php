<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
            $table->foreignId('id_stok')
                  ->references('id_stok')
                  ->on('stok_barang')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->date('tgl_transaksi');
            $table->integer('jml_barang');
            $table->enum('tipe', ['jual','beli']);
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
        Schema::dropIfExists('transaksi');
    }
}
