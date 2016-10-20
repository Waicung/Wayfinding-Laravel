<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('segments', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('route_id')->unsigned();
            $table->integer('start_id')->unsigned();
            $table->integer('end_id')->unsigned();
            $table->integer('distance')->unsigned();
            $table->integer('duration')->unsigned();
            $table->timestamps();

            $table->foreign('route_id')
                ->references('id')
                ->on('routes')
                ->onDelete('cascade');
            $table->foreign('start_id')
                ->references('id')
                ->on('points');
            $table->foreign('end_id')
                ->references('id')
                ->on('points');

        });
        Schema::create('instructions', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('segment_id')->unsigned();
            $table->string('content');
            $table->timestamps();

            $table->foreign('segment_id')
                ->references('id')
                ->on('segments')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('instructions');
        Schema::drop('segments');
    }
}
