<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaymentMethodFundingReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funding_report', function (Blueprint $table) {
           $table->string('payment_method')->nullable()->comment('0=Stripe; 1=Pay By Check;')->after('user_id');	
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
