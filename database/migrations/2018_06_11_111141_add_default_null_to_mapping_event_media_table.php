<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultNullToMappingEventMediaTable extends Migration
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
            $table->dropColumn('image'); 
            $table->dropColumn('video');
            $table->dropColumn('image_type');  
        });

        Schema::table('mapping_event_media', function(Blueprint $table)
        {
            $table->string('image',255)->nullable()->after('event_id'); 
            $table->string('video',255)->nullable()->after('image'); 
            $table->enum('image_type', ['0', '1'])->nullable()->after('video')->default(0);             
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
