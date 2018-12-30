<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('duration')->nullable();
            $table->unsignedInteger('price')->nullable();
            $table->unsignedInteger('promote_price')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->string('professor')->nullable();;
            $table->string('note')->nullable();
            $table->timestamps();
        });

        Schema::create('course_lesson', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('content')->nullable();
            $table->string('pdf_link')->nullable();
            $table->string('video_link')->nullable();
            $table->string('exercise_link')->nullable();

            $table->unsignedInteger('course_info_id');
            $table->string('note')->nullable();
            $table->timestamps();

            $table->foreign('course_info_id')->references('id')->on('course_info');
        });

        Schema::create('course_activity', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_info_id');
            $table->unsignedInteger('user_id');

            $table->dateTime('active_date')->nullable();
            $table->unsignedInteger('paid')->nullable();
            $table->dateTime('deadline')->nullable();

            $table->string('note')->nullable();
            $table->timestamps();

            $table->foreign('course_info_id')->references('id')->on('course_info');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('course_like', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_info_id');
            $table->unsignedInteger('user_id');
            $table->string('note')->nullable();
            $table->timestamps();

            $table->foreign('course_info_id')->references('id')->on('course_info');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('course_dislike', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_info_id');
            $table->unsignedInteger('user_id');
            $table->string('note')->nullable();
            $table->timestamps();

            $table->foreign('course_info_id')->references('id')->on('course_info');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('course_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_info_id');
            $table->unsignedInteger('user_id');
            $table->string('comment')->nullable();
            $table->timestamps();

            $table->foreign('course_info_id')->references('id')->on('course_info');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_comment');
        Schema::dropIfExists('course_dislike');
        Schema::dropIfExists('course_like');
        Schema::dropIfExists('course_activity');
        Schema::dropIfExists('course_lesson');
        Schema::dropIfExists('course_info');
    }
}
