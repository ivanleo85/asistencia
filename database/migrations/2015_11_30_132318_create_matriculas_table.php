<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('matriculas');
		Schema::create('matriculas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date("fecha");
			$table->decimal("monto",8,2);
			$table->integer("grado_id")->unsigned();
			$table->foreign("grado_id")
					->references("id")
					->on("grados")
					->onDelete("cascade");
			$table->integer("alumno_id")->unsigned();
			$table->foreign("alumno_id")
					->references("id")
					->on("alumnos")
					->onDelete("cascade");
			$table->integer("anio_escolar_id")->unsigned();
			$table->foreign("anio_escolar_id")
					->references("id")
					->on("anio_escolars")
					->onDelete("cascade");
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
		Schema::drop('matriculas');
	}

}
