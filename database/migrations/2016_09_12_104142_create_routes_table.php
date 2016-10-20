<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table)
        {
            $table->increments('id');
            $table->double('longitude');
            $table->double('latitude');
            $table->string('title')->nullable();
            $table->timestamps();
        });

        Schema::create('routes', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('origin_id')->unsigned();
            $table->integer('destination_id')->unsigned();
            $table->timestamps();

            $table->foreign('origin_id')
                ->references('id')
                ->on('points')
                ->onDelete('cascade');
            $table->foreign('destination_id')
                ->references('id')
                ->on('points')
                ->onDelete('cascade');
        });

        Schema::create('experiment_route', function (Blueprint $table)
        {
            $table->integer('experiment_id')->unsigned();
            $table->integer('route_id')->unsigned();

            $table->foreign('experiment_id')
                ->references('id')
                ->on('experiments')
                ->onDelete('cascade');
            $table->foreign('route_id')
                ->references('id')
                ->on('routes')
                ->onDelete('cascade');
                
            $table->primary(['experiment_id','route_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('experiment_route');
        Schema::drop('routes');
        Schema::drop('points');
    }
}
