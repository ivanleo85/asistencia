<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('perfils');
		Schema::create('perfils', function(Blueprint $table)
		{
			$table->integer('rol_id')->unsigned();
			$table->integer('menu_id')->unsigned();
			$table->primary(['rol_id', 'menu_id']);
			$table->foreign('rol_id')
					->references('id')
					->on('roles')
					->onDelete('cascade')
					->onUpdate('cascade');
			$table->foreign('menu_id')
					->references('id')
					->on('menus')
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
		Schema::drop('perfiles');
	}

}
