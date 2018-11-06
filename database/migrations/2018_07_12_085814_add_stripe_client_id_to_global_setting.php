<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStripeClientIdToGlobalSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('global_setting', function (Blueprint $table) {
           $table->string('stripe_client_id', 200)->nullable()->after('publish_key'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('global_setting', function (Blueprint $table) {
            //
        });
    }
}
