<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')
                  ->references('id')->on('admins')
                  ->onDelete('cascade');
            $table->string('subject')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->dateTime('closed_at')->nullable();
        });

        /*
         * experiment_guest many-many relationship
         *
         */
        Schema::create('participants', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('experiment_id')->unsigned();
            $table->integer('guest_id')->unsigned();
            $table->timestamps();

            $table->foreign('experiment_id')
                ->references('id')
                ->on('experiments')
                ->onDelete('cascade');
            $table->foreign('guest_id')
                ->references('id')
                ->on('guests')
                ->onDelete('cascade');

            $table->unique(['experiment_id', 'guest_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('participants');
        Schema::drop('experiments');
    }
}
