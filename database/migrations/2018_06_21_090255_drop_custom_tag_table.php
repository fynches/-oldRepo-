<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropCustomTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::dropIfExists('tags');
		Schema::dropIfExists('mapping_custom_tag'); 
		Schema::dropIfExists('custom_tag');

	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drop_tables_custom_tag', function (Blueprint $table) {
            //
        });
    }
}
