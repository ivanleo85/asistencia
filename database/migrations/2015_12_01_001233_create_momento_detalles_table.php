<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMomentoDetallesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('momento_detalles');
		Schema::create('momento_detalles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer("momento_id")->unsigned();
			$table->foreign("momento_id")
					->references("id")
					->on("momentos")
					->onDelete("cascade");
			$table->integer("capacidad_id")->unsigned();
			$table->foreign("capacidad_id")
					->references("id")
					->on("capacidads")
					->onDelete("cascade");
			$table->integer("metodo_id")->unsigned();
			$table->foreign("metodo_id")
					->references("id")
					->on("metodos")
					->onDelete("cascade");
			$table->integer("tecnica_id")->unsigned();
			$table->foreign("tecnica_id")
					->references("id")
					->on("tecnicas")
					->onDelete("cascade");
			$table->integer("medio_id")->unsigned();
			$table->foreign("medio_id")
					->references("id")
					->on("medios")
					->onDelete("cascade");
			$table->integer("material_id")->unsigned();
			$table->foreign("material_id")
					->references("id")
					->on("materials")
					->onDelete("cascade");
			$table->integer("instrumento_id")->unsigned();
			$table->foreign("instrumento_id")
					->references("id")
					->on("instrumentos")
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
		Schema::drop('momento_detalles');
	}

}
