<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilemahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profilemahasiswas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('profilemahasiswas');
    }
}
