<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMomentosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('momentos');
		Schema::create('momentos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->mediumText("inicio");
			$table->mediumText("desarrollo");
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
		Schema::drop('momentos');
	}

}
