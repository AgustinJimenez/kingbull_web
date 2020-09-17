<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddManyDatasToProfileProfiles extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profile__profiles', function(Blueprint $table)
        {
            $table->string('front_squat', 100)->nullable();
            $table->string('ohs', 100)->nullable();
            $table->string('clean', 100)->nullable();
            $table->string('press', 100)->nullable();
            $table->string('push_press', 100)->nullable();
            $table->string('bench_press', 100)->nullable();
            $table->string('thrusters', 100)->nullable();
            $table->string('c2b', 100)->nullable();
            $table->string('t2b', 100)->nullable();
            $table->string('mu', 100)->nullable();
            $table->string('bmu', 100)->nullable();
            $table->string('hspu', 100)->nullable();
            $table->string('hsw', 100)->nullable();
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
            $table->dropColumn('front_squat');
            $table->dropColumn('ohs');
            $table->dropColumn('clean');
            $table->dropColumn('press');
            $table->dropColumn('push_press');
            $table->dropColumn('bench_press');
            $table->dropColumn('thrusters');
            $table->dropColumn('c2b');
            $table->dropColumn('t2b');
            $table->dropColumn('mu');
            $table->dropColumn('bmu');
            $table->dropColumn('hspu');
            $table->dropColumn('hsw');
        });
    }

}
