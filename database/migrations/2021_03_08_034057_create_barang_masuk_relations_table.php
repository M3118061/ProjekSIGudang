<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangMasukRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barang_masuk', function (Blueprint $table) {
            $table->foreignId('id_barang')
                  ->references('id_barang')
                  ->on('data_barang')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('id_supplier')
                  ->references('id_supplier')
                  ->on('supplier')
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
        Schema::dropIfExists('barang_masuk_relations');
    }
}
