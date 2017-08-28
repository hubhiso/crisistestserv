<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOperateDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operate_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('case_id', 5)->references('case_id')->on('case_inputs');
            $table->date('operate_date')->nullable();
            $table->integer('advice')->nullable();
            $table->integer('negotiate_individual')->nullable();
            $table->integer('negotiate_policy')->nullable();
            $table->integer('prosecution')->nullable();
            $table->text('operate_detail')->nullable();
            $table->text('operate_result')->nullable();
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
        Schema::dropIfExists('operate_detail');
    }
}
