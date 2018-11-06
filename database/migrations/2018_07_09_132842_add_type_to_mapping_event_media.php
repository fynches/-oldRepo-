<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToMappingEventMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mapping_event_media', function(Blueprint $table)
        {
            $table->dropColumn('image_type'); 
		});
		
        Schema::table('mapping_event_media', function (Blueprint $table) {
            $table->integer("image_type")->nullable()->after('flag_video')->comment('0=Local Image; 1=video; 2=Facebook Images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mapping_event_media', function (Blueprint $table) {
            //
        });
    }
}
