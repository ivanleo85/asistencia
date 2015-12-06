<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('permisos');
		Schema::create('permisos', function(Blueprint $table)
		{
			$table->integer('usuario_id')->unsigned();
			$table->integer('rol_id')->unsigned();
			$table->primary(['usuario_id', 'rol_id']);
			$table->foreign('usuario_id')
					->references('id')
					->on('usuarios')
					->onDelete('cascade')
					->onUpdate('cascade');
			$table->foreign('rol_id')
					->references('id')
					->on('roles')
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
		Schema::drop('permisos');
	}

}
