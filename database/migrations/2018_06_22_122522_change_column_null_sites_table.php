<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnNullSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sites', function(Blueprint $table)
        {
        	$table->dropColumn('profile_image');
			$table->dropColumn('email_verify_code');
            $table->dropColumn('verify_forgot_password');
            $table->dropColumn('google_id');
            $table->dropColumn('token');
            $table->dropColumn('facebook_id');
        });

        Schema::table('sites', function(Blueprint $table)
        {
            $table->string('profile_image', 200)->nullable()->after('email');
			$table->string('email_verify_code', 200)->nullable()->after('remember_token');	
            $table->string('verify_forgot_password', 200)->nullable()->after('email_verify_code');
            $table->string('google_id', 200)->nullable()->after('verify_forgot_password');;
            $table->string('token', 200)->nullable()->after('google_id');;
            $table->string('facebook_id', 200)->nullable()->after('token');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sites', function (Blueprint $table) {
            //
        });
    }
}
