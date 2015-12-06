<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CargoTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('cargos')->insert(['nombre' => 'Director(a)']);
		\DB::table('cargos')->insert(['nombre' => 'Subdirector(a)']);
		\DB::table('cargos')->insert(['nombre' => 'Coordinador Académico']);
		\DB::table('cargos')->insert(['nombre' => 'Auxiliar']);
	}

}
