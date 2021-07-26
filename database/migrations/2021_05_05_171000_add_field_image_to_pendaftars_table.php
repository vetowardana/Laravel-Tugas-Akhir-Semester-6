<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldImageToPendaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pendaftars', function (Blueprint $table) {
            $table->string('image')->after('lowongan_id');
            $table->string('logo')->after('image');
            $table->string('email')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pendaftars', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('logo');
            $table->dropColumn('email');
        });
    }
}
