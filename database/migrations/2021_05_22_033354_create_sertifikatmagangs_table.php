<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSertifikatmagangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sertifikatmagangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('lowongan_id');
            $table->string('name');
            $table->string('nama_perusahaan');
            $table->string('nama_lowongan');
            $table->date('tanggal_submit');
            $table->time('waktu_submit');
            $table->string('sertifikat_magang');
            $table->string('slug');
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
        Schema::dropIfExists('sertifikatmagangs');
    }
}
