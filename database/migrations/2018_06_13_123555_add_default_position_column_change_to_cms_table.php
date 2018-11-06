<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultPositionColumnChangeToCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms', function(Blueprint $table)
        {
            $table->dropColumn("featured_image_position");
        });

        Schema::table('cms', function(Blueprint $table)
        {
            $table->enum('featured_image_position', ['0','1','2'])->after('featured_image')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms', function (Blueprint $table) {
            //
        });
    }
}
