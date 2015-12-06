<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PerfilTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Superadmin
		for($i = 1; $i <= 6; $i++){
			\DB::table('perfiles')->insert(['rol_id' => 1, 'menu_id' => $i]);
		}
	}

}
