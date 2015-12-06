<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnioEscolarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('anio_escolars');
		Schema::create('anio_escolars', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date("fecha_inicio");
			$table->date("fecha_termino");
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
		Schema::drop('anio_escolars');
	}

}
