<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCbtHasilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cbt_hasil', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('mapel_id');
            $table->unsignedInteger('sesi_id');
            $table->unsignedInteger('soal_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sesi_id')->references('id')->on('cbt_sesi');
            $table->foreign('mapel_id')->references('id')->on('cbt_mapel');
            $table->foreign('soal_id')->references('id')->on('cbt_soal');
            $table->text('jawaban');
            $table->string('nilai')->nullable();
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
        Schema::dropIfExists('cbt_hasil');
    }
}
