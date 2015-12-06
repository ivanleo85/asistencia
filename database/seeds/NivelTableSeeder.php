<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class NivelTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('niveles')->insert(['nombre' => 'Primaria']);
		\DB::table('niveles')->insert(['nombre' => 'Secundaria']);
	}

}
