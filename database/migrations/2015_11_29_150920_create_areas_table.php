<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('areas');
		Schema::create('areas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string("descripcion",15);
			$table->boolean("estado")->default(true);
			$table->integer("area_id")->nullable()->unsigned();
			$table->foreign("area_id")
					->references("id")
					->on("areas")
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
		Schema::drop('areas');
	}

}
