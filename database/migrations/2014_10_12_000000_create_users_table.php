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
        Schema::create('users_group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('note')->nullable();
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->unsignedInteger('users_group_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('users_group_id')->references('id')->on('users_group');
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('note')->nullable();
            $table->timestamps();

        });

        Schema::create('user_role', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('users_group_id');
            $table->string('note')->nullable();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('users_group_id')->references('id')->on('users_group');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('users');
        Schema::dropIfExists('users_group');
        Schema::dropIfExists('user_role');
    }
}
