<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCbtMapelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cbt_mapel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class_key');
            $table->string('kode_mapel')->unique();
            $table->string('nama_mapel');
            $table->integer('KKM');
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
        Schema::dropIfExists('cbt_mapel');
    }
}
