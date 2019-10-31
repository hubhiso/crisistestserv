<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EdittypeAndAddBiosexDetailToCaseInputs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('case_inputs', function (Blueprint $table) {
            //
            $table->dropColumn('biosex');
            $table->dropColumn('emergency');
        });

        Schema::table('case_inputs', function (Blueprint $table) {
            //
            $table->string('sex_name')->nullable()->after('sex');
            $table->enum('biosex', ['1', '2'])->nullable()->after('sex_name');
            $table->enum('biosex_name', ['ชาย', 'หญิง'])->after('biosex')->nullable();
            $table->enum('emergency', ['yes', 'no'])->nullable()->after('victim_tel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('case_inputs', function (Blueprint $table) {
            //
        });
    }
}
