<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasanglowongansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasanglowongans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('nama_lowongan');
            $table->text('deskripsi');
            $table->string('image');
            $table->string('slug');
            $table->date('lowongan_mulai');
            $table->date('lowongan_selesai');
            $table->string('nama_Perusahaan');
            $table->string('jenis_perusahaan');
            $table->string('no_telp');
            $table->text('alamat');
            $table->string('kota');
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
        Schema::dropIfExists('pasanglowongans');
    }
}
