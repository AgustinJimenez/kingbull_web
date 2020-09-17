<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileProfilesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profile__profiles', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('genero')->nullable();
            $table->string('edad')->nullable();
            $table->string('altura')->nullable();
            $table->string('peso')->nullable();
            $table->string('fran')->nullable();
            $table->string('helen')->nullable();
            $table->string('grace')->nullable();
            $table->string('filthy')->nullable();
            $table->string('fight_gone_bad')->nullable();
            $table->string('sprint')->nullable();
            $table->string('run')->nullable();
            $table->string('clean_jerk')->nullable();
            $table->string('snatch')->nullable();
            $table->string('deadlift')->nullable();
            $table->string('back_squat')->nullable();
            $table->string('max_pull_ups')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profile__profiles');
	}
}
