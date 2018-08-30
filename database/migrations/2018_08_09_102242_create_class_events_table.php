<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->unsignedInteger('events_for');
            $table->unsignedInteger('from_user');
            $table->foreign('events_for')->references('id')->on('user_class');
            $table->foreign('from_user')->references('id')->on('users');
            $table->longText('events_content');
            $table->softDeletes();
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
        Schema::dropIfExists('class_events');
    }
}
