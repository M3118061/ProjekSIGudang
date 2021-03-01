<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLapKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lap_keluar', function (Blueprint $table) {
            $table->id('id_lap_keluar');
            $table->foreignId('id_keluar')
                  ->references('id_keluar')
                  ->on('barang_keluar')
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
        Schema::dropIfExists('lap_keluar');
    }
}
