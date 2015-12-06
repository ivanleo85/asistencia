<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemanasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('semanas');
		Schema::create('semanas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->mediumText("sesion");
			$table->mediumText("descripcion");
			$table->integer("bimestre_id")->unsigned();
			$table->foreign("bimestre_id")
					->references("id")
					->on("bimestres")
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
		Schema::drop('semanas');
	}

}
