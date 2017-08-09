<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficerAddDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('case_id', 5)->references('case_id')->on('case_inputs');
            $table->date('birth_date')->nullable();
            $table->integer('age')->nullable();
            $table->integer('current_status')->nullable();
            $table->integer('occupation')->nullable();
            $table->text('occupation_detail')->nullable();
            $table->text('address')->nullable();
            $table->integer('card_type')->nullable();
            $table->bigInteger('card_number')->nullable();
            $table->integer('type_offender')->nullable();
            $table->integer('subtype_offender')->nullable();
            $table->text('violator_name')->nullable();
            $table->text('violator_organization')->nullable();
            $table->text('offender_organization')->nullable();
            $table->text('accident_location')->nullable();
            $table->text('accident_time')->nullable();
            $table->text('violation_characteristics')->nullable();
            $table->text('effect')->nullable();
            $table->integer('cause_type1')->nullable();
            $table->integer('cause_type2')->nullable();
            $table->integer('cause_type3')->nullable();
            $table->integer('cause_type4')->nullable();
            $table->integer('etc')->nullable();
            $table->text('etc_detail')->nullable();
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
        Schema::dropIfExists('add_details');
    }
}
