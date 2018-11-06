<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_account', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('event')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('bank_name');
            $table->integer('routing_no');
            $table->integer('account_no');
            $table->string('ssn_last_4');
            $table->string('postal_code');
            $table->string('state');
            $table->date('dob');
            $table->string('personal_id_number');
            $table->string('business_tax_id');
            $table->string('document');
            $table->string('ip');
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
        Schema::dropIfExists('bank_account');
    }
}
