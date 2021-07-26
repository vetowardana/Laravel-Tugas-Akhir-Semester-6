<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('perusahaan_id');
            $table->unsignedBigInteger('lowongan_id');
            $table->string('name');
            $table->string('nama_universitas');
            $table->string('prodi');
            $table->string('nim');
            $table->string('jenis_kelamin');
            $table->string('status_perkawinan');
            $table->date('tanggal_lahir');
            $table->string('no_telp');
            $table->text('alamat');
            $table->string('kota');
            $table->string('kode_pos');
            $table->string('nama_perusahaan');
            $table->string('nama_lowongan');
            $table->string('surat_permohonan');
            $table->string('slug');
            $table->string('status');
            $table->text('alasan')->nullable();
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
        Schema::dropIfExists('pendaftars');
    }
}
