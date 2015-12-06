<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('docentes');
		Schema::create('docentes', function(Blueprint $table)
		{
			$table->integer('id')->unsigned();
			$table->integer('persona_id')->unsigned();
			$table->enum('tiempo', ['C', 'P']);
			$table->integer('horassemana');
			$table->integer('nivel_id')->unsigned();
			$table->primary('id');
			$table->foreign('persona_id')
					->references('id')
					->on('personas')
					->onDelete('cascade')
					->onUpdate('cascade');
			$table->foreign('nivel_id')
					->references('id')
					->on('niveles')
					->onDelete('cascade')
					->onUpdate('cascade');
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
		Schema::drop('docentes');
	}

}
