<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DiaTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('dias')->insert(['descripcion' => 'Lunes']);
		\DB::table('dias')->insert(['descripcion' => 'Martes']);
		\DB::table('dias')->insert(['descripcion' => 'Miércoles']);
		\DB::table('dias')->insert(['descripcion' => 'Jueves']);
		\DB::table('dias')->insert(['descripcion' => 'Viernes']);
		\DB::table('dias')->insert(['descripcion' => 'Sábado']);
		\DB::table('dias')->insert(['descripcion' => 'Domingo']);
	}

}
