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
            $table->integer('amphur_id');
            $table->text('tel');
            $table->integer('problem_case');
            $table->integer('sub_problem');
            $table->integer('group_code');
            $table->text('case_id');
            $table->text('sender_case');
            $table->text('sender');
            $table->text('reciver');
            $table->text('status');
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
