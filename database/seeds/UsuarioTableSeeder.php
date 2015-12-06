<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsuarioTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		\DB::table('usuarios')->insert([
			'id' => 1,
			'usuario' => 'rortiz',
			'password' => bcrypt('123'),
		]);
	}

}
