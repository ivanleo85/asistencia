<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSistemasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('sistemas');
		Schema::create('sistemas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('icono', 20)->nullable();
			$table->integer('orden');
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
		Schema::drop('sistemas');
	}

}
