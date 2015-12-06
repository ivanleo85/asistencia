<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBimestresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('bimestres');
		Schema::create('bimestres', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date("fecha-_ini");
			$table->date("fecha_fin");
			$table->boolean("estado")->default(true);
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
		Schema::drop('bimestres');
	}

}
