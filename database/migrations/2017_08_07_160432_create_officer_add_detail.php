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
            $table->text('case_id');
            $table->foreign('case_id')->references('case_id')->on('case_inputs');
            $table->date('birth_date');
            $table->integer('current_status');
            $table->integer('occupation');
            $table->text('address');
            $table->integer('card_type');
            $table->integer('card_number');
            $table->integer('type_offender');
            $table->integer('subtype_offender');
            $table->text('violator_name');
            $table->text('violator_organization');
            $table->text('offender_organization');
            $table->text('accident_location');
            $table->text('accident_time');
            $table->text('violation_characteristics');
            $table->text('effect');
            $table->text('offender_organization');
            $table->integer('cause_type1');
            $table->integer('cause_type2');
            $table->integer('cause_type3');
            $table->integer('cause_type4');
            $table->integer('etc');
            $table->text('etc_detail');
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
