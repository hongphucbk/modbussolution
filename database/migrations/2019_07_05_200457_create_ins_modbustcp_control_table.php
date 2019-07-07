<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsModbustcpControlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ins_modbustcp_control', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('device_id');
            $table->string('name');
            $table->string('register');
            $table->string('type');
            $table->integer('slaveid')->default(1);
            $table->double('scalevalue')->default(1);
            $table->integer('display')->default(1);   
            $table->string('note')->nullable();
            $table->timestamps();

            $table->foreign('device_id')->references('id')->on('ins_modbustcp_device');
        });

        Schema::create('ins_modbustcp_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user');
            $table->string('description');
            $table->string('note')->nullable();
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
        Schema::dropIfExists('ins_modbustcp_control');
        Schema::dropIfExists('ins_modbustcp_history');


    }
}
