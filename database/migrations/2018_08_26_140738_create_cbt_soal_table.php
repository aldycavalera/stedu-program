<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCbtSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cbt_soal', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mapel_id');
            $table->unsignedInteger('sesi_id');
            $table->foreign('mapel_id')->references('id')->on('cbt_mapel');
            $table->foreign('sesi_id')->references('id')->on('cbt_sesi');
            $table->text('soal');
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
        Schema::dropIfExists('cbt_soal');
    }
}
