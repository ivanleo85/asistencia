<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministrativosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('administrativos');
		Schema::create('administrativos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer("persona_id")->unsigned();
			$table->foreign("persona_id")
					->references("id")
					->on("personas")
					->onDelete("cascade")
					->onUpdate('cascade');
			$table->integer('cargo_id')->unsigned();
			$table->foreign('cargo_id')
					->references('id')
					->on('cargos')
					->onDelete('cascade')
					->onUpdate('cascade');
			$table->integer('administrativo_id')->unsigned();
			$table->foreign('administrativo_id')
					->references('id')
					->on('administrativos')
					->onDelete('cascade')
					->onUpdate('cascade');
			$table->boolean('estado')->default(true);
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
		Schema::drop('administrativos');
	}

}
