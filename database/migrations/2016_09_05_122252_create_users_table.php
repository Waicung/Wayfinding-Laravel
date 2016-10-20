<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->morphs('userable');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('admins', function(Blueprint $table){
            $table->increments('id');
            $table->boolean('activated')->default(1);
            $table->boolean('superuser')->default(0);
            $table->timestamps();
        });

        Schema::create('guests', function(Blueprint $table){
            $table->increments('id');
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
        Schema::drop('users');
        Schema::drop('admins');
        Schema::drop('guests');
    }
}
