<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RolTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('roles')->insert(['nombre' => 'Superadmin']);
		\DB::table('roles')->insert(['nombre' => 'Admin']);
		\DB::table('roles')->insert(['nombre' => 'Docente']);
		\DB::table('roles')->insert(['nombre' => 'Administrativo']);
		\DB::table('roles')->insert(['nombre' => 'Alumno']);

	}

}
