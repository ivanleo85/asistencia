<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('usuarios');
		Schema::create('usuarios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('usuario', 50)->unique();
			$table->string('password', 60);
			$table->enum('activo', [0,1])->default(1);
			$table->integer('intentos')->default(0);
			$table->integer('persona_id')->unsigned();
			$table->foreign('persona_id')
					->references('id')
					->on('personas')
					->onDelete('cascade')
					->onUpdate('cascade');
			$table->integer('rol_id')->unsigned();
			$table->foreign('rol_id')
					->references('id')
					->on('rols')
					->onDelete('cascade')
					->onUpdate('cascade');
			$table->rememberToken();
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
		Schema::drop('usuarios');
	}

}
