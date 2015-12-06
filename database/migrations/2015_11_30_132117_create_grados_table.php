<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('grados');
		Schema::create('grados', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string("descripcion",20);
			$table->integer("grado_id")->unsigned();
			$table->foreign("grado_id")
					->references("id")
					->on("grados")
					->onDelete("cascade");
			$table->integer("capacidad");
			$table->integer("vacantes");
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
		Schema::drop('grados');
	}

}
