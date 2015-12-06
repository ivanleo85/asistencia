<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapacidadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('capacidads');
		Schema::create('capacidads', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string("descripcion",20);
			$table->boolean("estado")->default(true);
			$table->integer("competencia_id")->unsigned();
			$table->foreign("competencia_id")
					->references("id")
					->on("competencias")
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
		Schema::drop('capacidads');
	}

}
