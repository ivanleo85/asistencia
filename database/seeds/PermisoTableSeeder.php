<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PermisoTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('permisos')->insert(['usuario_id' => 1, 'rol_id' => 1]);
	}

}
