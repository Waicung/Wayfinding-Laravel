<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestSelectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_selects', function (Blueprint $table) {
            $table->integer('experiment_id')->unsigned();
            $table->foreign('experiment_id')
                  ->references('experiment_id')->on('experiments');
            $table->integer('test_id')->unsigned();
            $table->foreign('test_id')
                  ->references('test_id')->on('tests');
            $table->timestamps();
            $table->primary(['experiment_id', 'test_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('test_selects');
    }
}
