<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouteSelectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_selects', function (Blueprint $table) {
            $table->integer('experiment_id')->unsigned();
            $table->foreign('experiment_id')
                  ->references('experiment_id')->on('experiments')
                  ->onDelete('cascade');
            $table->integer('route_id')->unsigned();
            $table->foreign('route_id')
                  ->references('route_id')->on('routes')
                  ->onDelete('cascade');
            $table->timestamps();
            $table->index(['experiment_id', 'route_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('route_selects');
    }
}
