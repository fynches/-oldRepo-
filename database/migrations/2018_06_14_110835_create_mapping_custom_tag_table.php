<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMappingCustomTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapping_custom_tag', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('tag_id')->unsigned();
            $table->foreign('tag_id')->references('id')->on('custom_tag')->onDelete('cascade');
			$table->integer('user_id');
			$table->integer('event_id');
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
        Schema::dropIfExists('mapping_custom_tag');
    }
}
