<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class PersonaTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//creando administrador
		$id=\DB::table('personas')->insertGetId([
			'dni' => '46665218',
			'nombres' => 'Rogger Alejandro',
			'apellidopaterno' => 'Ortiz',
			'apellidomaterno' => 'Briceño',
			'sexo' => 'M',
			'celular' => '949159512',
			'email' => 'ra.bricenio@gmail.com',
		]);
		\DB::table('usuarios')->insert([
				'usuario' => 'rortiz',
				'password' => \Hash::make('admin'),
				'persona_id' => $id,
		]);
		$faker= Faker::create();
		//generando personas
		for($i=0;$i<40;$i++)
		{
			$genero=rand(1,30);
			$id=\DB::table('personas')->
			insertGetId([
					'nombres' => $genero%2==0? $faker->firstNameFemale:$faker->firstNameMale,
					'apellidopaterno' => $faker->lastName,
					'apellidomaterno' => $faker->lastName,
					'sexo' => $genero%2==0?'F':'M'
			]);

			\DB::table('usuarios')->insert([
					'usuario' => $faker->userName,
					'password' => \Hash::make('secret'),
					'persona_id' => $id,
					'rol_id' => rand(3,5)
			]);
		}


	}

}
