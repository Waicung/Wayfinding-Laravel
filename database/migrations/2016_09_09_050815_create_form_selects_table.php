<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormSelectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_selects', function (Blueprint $table) {
            $table->integer('experiment_id')->unsigned();
            $table->foreign('experiment_id')
                  ->references('experiment_id')->on('experiments');
            $table->integer('form_id')->unsigned();
            $table->foreign('form_id')
                  ->references('form_id')->on('forms');
            $table->timestamps();
            $table->primary(['experiment_id', 'form_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('form_selects');
    }
}
