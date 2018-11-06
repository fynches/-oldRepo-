<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
			$table->string('last_name');
            $table->string('email')->unique();
			$table->string('profile_image');
            $table->string('password');
            $table->rememberToken();
			$table->string('email_verify_code');
			$table->string('verify_forgot_password');
			$table->string('google_id');
			$table->string('token');
			$table->string('facebook_id');
			$table->enum('provider', ['0', '1', '2'])->comment('0=standard,1=facebook,2=google');
			$table->string('status');
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
        Schema::dropIfExists('sites');
    }
}
