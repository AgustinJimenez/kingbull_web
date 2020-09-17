<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnImagenPublicaciones extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('publicaciones__publicaciones', function(Blueprint $table)
        {
            $table->string('publi_img')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('publicaciones__publicaciones', function(Blueprint $table)
        {
            $table->dropColumn('publi_img');
        });
    }

}
