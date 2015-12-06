<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('personas');
		Schema::create('personas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->char('dni',8)->unique()->nullable();
			$table->string('nombres', 80);
			$table->string('apellidopaterno', 50);
			$table->string('apellidomaterno', 50);
			$table->enum('sexo', ['M', 'F']);
			$table->string('foto')->nullable();
			$table->string('celular', 15)->unique()->nullable();
			$table->string('email', 50)->unique()->nullable();
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
		Schema::drop('personas');
	}

}
