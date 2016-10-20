<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned();
            $table->string('title')->unique();
            $table->timestamps();
            $table->boolean('activated')->default(1);
            $table->boolean('supervised')->default(0);
            $table->boolean('touchscreen')->default(0);

            $table->foreign('admin_id')
                ->references('id')->on('admins')
                ->onDelete('cascade');
        });

        Schema::create('experiment_test', function (Blueprint $table) {
            $table->integer('experiment_id')->unsigned();
            $table->integer('test_id')->unsigned();
            //$table->timestamps();

            $table->foreign('experiment_id')
                ->references('id')->on('experiments')
                ->onDelete('cascade');
            $table->foreign('test_id')
                ->references('id')->on('tests')
                ->onDelete('cascade');

            $table->primary(['experiment_id','test_id']);
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('experiment_test');
        Schema::drop('tests');
    }
}
