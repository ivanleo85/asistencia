<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('menus');
		Schema::create('menus', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre', 50);
			$table->string('ruta', 100);
			$table->string('icono', 20)->nullable();
			$table->enum('estado', [0, 1])->default(1);
			$table->integer('orden');
			$table->integer('sistema_id')->unsigned();
			$table->foreign('sistema_id')->references('id')->on('sistemas')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::drop('menus');
	}

}
