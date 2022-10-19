<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_pembelian', function (Blueprint $table) {
            $table->integer('id_pembelian')->primary();
            $table->integer('id_karyawan');
            $table->integer('id_menu');
            $table->boolean('status')->default(false);
        });
        Schema::table('list_pembelian', function (Blueprint $table) {

            $table->foreign('id_karyawan')->references('id_karyawan')->on('data_karyawan');
            $table->foreign('id_menu')->references('id_menu')->on('daftar_menu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_pembelian');
    }
};