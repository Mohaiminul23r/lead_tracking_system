<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTAsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_a_s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schedule_id')->unsigned()->nullable();
            $table->integer('meeting_id')->unsigned()->nullable();
            $table->string('source');
            $table->string('destination');
            $table->string('cost');
            $table->string('remarks')->nullable();
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('t_a_s');
    }
}
