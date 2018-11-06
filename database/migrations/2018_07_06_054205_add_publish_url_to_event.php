<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPublishUrlToEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('event', function(Blueprint $table)
        {
            $table->dropColumn('custome_url'); 
			$table->dropColumn('custom_url'); 
        });
		
        Schema::table('event', function (Blueprint $table) {
            $table->string("publish_url")->nullable()->after('is_hide');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event', function (Blueprint $table) {
            //
        });
    }
}
