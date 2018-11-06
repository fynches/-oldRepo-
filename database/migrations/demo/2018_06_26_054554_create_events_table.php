<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('title');
			$table->text('description');
            $table->integer('age_range');
            $table->dateTime('event_publish_date');
            $table->dateTime('event_end_date');
            $table->integer('zipcode');
			$table->string('custom_url');
            $table->integer('is_hide');
            $table->enum('status', ['1', '2','3'])->comment('1=Active; 2=Inactive; 3=Expired');
            $table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
}
