<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('evaluacions');
		Schema::create('evaluacions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string("descripcion",20);
			$table->string("siglas",4);
			$table->boolean("estado")->default(true);
			$table->integer("evaluacion_id")->unsigned();
			$table->foreign("evaluacion_id")
					->references("id")
					->on("evaluacions")
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
		Schema::drop('evaluacions');
	}

}
