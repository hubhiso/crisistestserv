<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_inputs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->integer('sex');
            $table->integer('prov_id');
            $table->foreign('prov_id')->references('PROVINCE_CODE')->on('provinces');
            $table->integer('amphur_id');
            $table->foreign('amphur_id')->references('AMPHUR_CODE')->on('amphurs');
            $table->text('agent_tel')->nullable();
            $table->text('victim_tel')->nullable();
            $table->integer('problem_case');
            $table->integer('sub_problem');
            $table->integer('group_code')->nullable();
            $table->text('case_id')->nullable();
            $table->text('detail')->nullable();
            $table->text('sender_case')->nullable();
            $table->text('sender')->nullable();
            $table->text('receiver')->nullable();
            $table->text('status')->nullable();
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
        Schema::dropIfExists('case_input');
    }
}
