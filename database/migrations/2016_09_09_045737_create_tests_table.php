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
            $table->increments('test_id');
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')
                  ->references('admin_id')->on('admins')
                  ->onDelete('cascade');
            $table->string('title');
            $table->string('page');
            $table->timestamps();
            $table->boolean('activated')->default(0);
            $table->boolean('supervised')->default(0);
            $table->boolean('touchscreen')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tests');
    }
}
