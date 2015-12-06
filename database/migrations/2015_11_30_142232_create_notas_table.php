<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('notas');
		Schema::create('notas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->decimal("nota",2,2);
			$table->integer("bimestre_id")->unsigned();
			$table->foreign("bimestre_id")
					->references("id")
					->on("bimestres")
					->onDelete("cascade");
			$table->integer("evaluacion_id")->unsigned();
			$table->foreign("evaluacion_id")
					->references("id")
					->on("evaluacions")
					->onDelete("cascade");
			$table->integer("matricula_id")->unsigned();
			$table->foreign("matricula_id")
					->references("id")
					->on("matriculas")
					->onDelete("cascade");
			$table->integer("area_id")->unsigned();
			$table->foreign("area_id")
					->references("id")
					->on("areas")
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
		Schema::drop('notas');
	}

}
