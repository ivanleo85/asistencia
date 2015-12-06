<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		$this->call('RolTableSeeder');
		$this->call('CargoTableSeeder');
		$this->call('NivelTableSeeder');
		$this->call('PersonaTableSeeder');
		$this->call('UsuarioTableSeeder');

		$this->call('MenuTableSeeder');
		$this->call('PermisoTableSeeder');
		$this->call('PerfilTableSeeder');
	}
}
