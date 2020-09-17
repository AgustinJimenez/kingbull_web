<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasReservasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservas__reservas', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');

            $table->integer('profile_id')->unsigned()->index();
            $table->foreign('profile_id')->references('id')->on('profile__profiles');

            $table->date('fecha');

            $table->integer('horario_id')->unsigned()->index();
            $table->foreign('horario_id')->references('id')->on('reservas__horarios')->onDelete('cascade');

            $table->enum('estado', ['reservado', 'eliminado']);

            // Your fields
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
		Schema::drop('reservas__reservas');
	}
}
