<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id('id_keluar');
            $table->string('nama_barang');
            $table->foreignId('id_jenis')
                  ->references('id_jenis')
                  ->on('jenis_barang')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->integer('jml_barang');
            $table->foreignId('id_satuan')
                  ->references('id_satuan')
                  ->on('satuan_barang')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->date('tgl_keluar');
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
        Schema::dropIfExists('barang_keluar');
    }
}
