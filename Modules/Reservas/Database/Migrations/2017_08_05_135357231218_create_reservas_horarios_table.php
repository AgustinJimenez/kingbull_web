<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasHorariosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservas__horarios', function(Blueprint $table) 
		{
			$table->engine = 'InnoDB';
            $table->increments('id');
            $table->time('desde');
            $table->time('hasta');
            $table->integer('cantidad_maxima_usuarios')->default(0);
            $table->integer('dia_id')->unsigned()->index();
            $table->foreign('dia_id')->references('id')->on('reservas__dias')->onDelete('cascade');
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
		Schema::drop('reservas__horarios');
	}
}
