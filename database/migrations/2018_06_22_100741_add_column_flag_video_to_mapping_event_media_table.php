<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnFlagVideoToMappingEventMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mapping_event_media', function (Blueprint $table) {
            $table->enum('flag_video', ['0', '1'])->comment('0=Url; 1=File')->after('video')->default(0);
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
