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
            $table->increments('experiment_id');
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')
                  ->references('admin_id')->on('admins')
                  ->onDelete('cascade');
            $table->string('subject')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->timestamp('closed_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('experiments');
    }
}
