<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('participant_id')->unsigned();
            $table->integer('route_id')->unsigned();
            $table->integer('next_id')->unsigned()->nullable();
            $table->timestampTz('completed_at');
            $table->timestamps();

            $table->foreign('participant_id')
                ->references('id')
                ->on('participants')
                ->onDelete('cascade');
            $table->foreign('route_id')
                ->references('id')
                ->on('routes')
                ->onDelete('cascade');
            $table->foreign('next_id')
                ->references('id')
                ->on('assignments');

            $table->unique(['participant_id','route_id']);
        });

        Schema::create('modifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assignment_id')->unsigned();
            $table->unsignedTinyInteger('segment_num');
            $table->tinyInteger('mode');
            $table->string('content',160)->nullable();
            $table->timestamps();

            $table->foreign('assignment_id')
            ->references('id')
            ->on('assignments')
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
        Schema::drop('modifications');
        Schema::drop('assignments');
    }
}
