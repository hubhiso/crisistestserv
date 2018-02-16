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
            $table->text('sex_etc')->nullable();
            $table->integer('nation')->nullable();
            $table->text('nation_etc')->nullable();
            $table->integer('prov_id');
            $table->foreign('prov_id')->references('PROVINCE_CODE')->on('provinces');
            $table->integer('amphur_id');
            $table->foreign('amphur_id')->references('AMPHUR_CODE')->on('amphurs');
            $table->text('agent_tel')->nullable();
            $table->text('victim_tel')->nullable();
            $table->integer('problem_case');
            $table->integer('sub_problem');
            $table->integer('group_code')->nullable();
            $table->string('case_id', 5)->index();
            $table->text('detail')->nullable();
            $table->text('need')->nullable();
            $table->text('sender_case')->nullable();
            $table->text('sender')->nullable();
            $table->text('receiver')->nullable();
            $table->integer('receiver_id')->nullable();
            $table->text('status')->nullable();
            $table->text('reject_reason')->nullable();
            /////  operate path ////////
            $table->integer('operate_result_status')->nullable();
            $table->integer('compensation')->nullable();
            $table->integer('change_policy')->nullable();
            $table->integer('prov_refer')->nullable();
            $table->integer('refer_type')->nullable();
            $table->text('refer_name')->nullable();
            $table->integer('evaluate1')->nullable();
            $table->integer('evaluate2')->nullable();

            ///////////////////////////
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
