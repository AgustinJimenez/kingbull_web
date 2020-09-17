<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCuentaToProfileProfiles extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profile__profiles', function(Blueprint $table)
        {

          $table->string('estado_cuenta');
          $table->date('fecha_vencimiento');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profile__profiles', function(Blueprint $table)
        {
          $table->dropColumn('estado_cuenta');
          $table->dropColumn('fecha_vencimiento');

        });
    }

}
