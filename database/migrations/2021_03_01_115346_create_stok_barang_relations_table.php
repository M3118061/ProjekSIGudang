<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokBarangRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stok_barang', function (Blueprint $table) {
            $table->foreignId('id_jenis')
                  ->references('id_jenis')
                  ->on('jenis_barang')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('id_satuan')
                  ->references('id_satuan')
                  ->on('satuan_barang')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('stok_barang_relations');
    }
}
