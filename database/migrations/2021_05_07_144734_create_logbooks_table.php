<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logbooks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('perusahaan_id');
            $table->unsignedBigInteger('lowongan_id');
            $table->string('name');
            $table->string('nama_perusahaan');
            $table->string('nama_lowongan');
            $table->string('jenis_kegiatan');
            $table->text('uraian_kegiatan');
            $table->date('tanggal_kegiatan');
            $table->time('waktu_kegiatan');
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
        Schema::dropIfExists('logbooks');
    }
}
