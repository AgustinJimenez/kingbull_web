<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserTokenTipoUsuarioIdToProfileProfiles extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profile__profiles', function(Blueprint $table)
        {
            $table->integer('tipo_usuario_id')->unsigned()->index()->nullable();
            $table->foreign('tipo_usuario_id')->references('id')->on('profile_tipo_usuario');

            $table->string('user_token', 60)->nullable();
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
            $table->dropColumn('tipo_usuario_id');
            $table->dropColumn('user_token');
        });
    }

}
