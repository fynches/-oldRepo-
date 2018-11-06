<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveColumnToEventTable extends Migration
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
        	$table->dropColumn('status');
        });

        Schema::table('event', function(Blueprint $table)
        {
        	$table->enum('status', ['1','2','3'])->comment('1=Active; 2=Completed; 3=Closed');
			
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
