<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanmagangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporanmagangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('perusahaan_id');
            $table->unsignedBigInteger('lowongan_id');
            $table->string('name');
            $table->string('nama_perusahaan');
            $table->string('nama_lowongan');
            $table->string('judul_laporan');
            $table->date('tanggal_dibuat');
            $table->time('waktu_dibuat');
            $table->string('laporan_magang');
            $table->string('slug');
            $table->string('status');
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
        Schema::dropIfExists('laporanmagangs');
    }
}
