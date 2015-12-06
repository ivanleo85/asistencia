<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaDocenteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('area_docente');
		Schema::create('area_docente', function(Blueprint $table)
		{
			$table->integer("dia_id")->unsigned();
			$table->foreign("dia_id")
					->references("id")
					->on("dias")
					->onDelete("cascade");
			$table->time('HoraInicio');
			$table->time('HoraFin');
			$table->integer("docente_id")->unsigned();
			$table->foreign("docente_id")
					->references("id")
					->on("docentes")
					->onDelete("cascade");
			$table->integer("area_id")->unsigned();
			$table->foreign("area_id")
					->references("id")
					->on("areas")
					->onDelete("cascade");
			$table->integer("grado_id")->unsigned();
			$table->foreign("grado_id")
					->references("id")
					->on("grados")
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
		Schema::drop('area_docente');
	}

}
