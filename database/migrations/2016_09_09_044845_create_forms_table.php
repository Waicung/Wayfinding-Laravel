<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned();
            $table->string('title')->unique();
            $table->timestamps();
            $table->boolean('activated')->default(1);

            $table->foreign('admin_id')
                ->references('id')->on('admins')
                ->onDelete('cascade');
        });

        Schema::create('experiment_form', function (Blueprint $table) {
            $table->integer('experiment_id')->unsigned();
            $table->integer('form_id')->unsigned();
            //$table->timestamps();

            $table->foreign('experiment_id')
                ->references('id')->on('experiments')
                ->onDelete('cascade');
            $table->foreign('form_id')
                ->references('id')->on('forms')
                ->onDelete('cascade');

            $table->primary(['experiment_id','form_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('experiment_form');
        Schema::drop('forms');
    }
}
