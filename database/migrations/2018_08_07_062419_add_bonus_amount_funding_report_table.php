<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBonusAmountFundingReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funding_report', function (Blueprint $table) {
           $table->integer('bonus_flag')->nullable()->comment('0=No; 1=Yes;')->after('donated_amount');	
           $table->string('bonus_amount')->nullable()->after('bonus_flag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funding_report', function (Blueprint $table) {
            //
        });
    }
}
