<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function(Blueprint $table){
            $table->integer('guest_id')->unsigned()->unique();
            $table->foreign('guest_id')
                  ->references('user_id')->on('users')
                  ->onDelete('cascade');
            $table->boolean('future_exp')->default(0);
            $table->boolean('result_notified')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('guests');
    }
}
