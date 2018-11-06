<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultNullToActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activity_log', function(Blueprint $table)
        {
            $table->dropColumn('verb');
            $table->dropColumn('useragent');
        });

        Schema::table('activity_log', function(Blueprint $table)
        {
            $table->string('verb', 200)->nullable()->after('user_id');
            $table->string('useragent', 200)->nullable()->after('verb'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activity_log', function (Blueprint $table) {
            //
        });
    }
}
