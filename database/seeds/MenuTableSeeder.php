<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MenuTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *10019636
	 * @return void
	 */
	public function run()
	{
		$id = \DB::table('sistemas')->insertGetId(['nombre' => 'Mantenedores', 'icono' => 'user.png', 'orden' => 1]);
		\DB::table('menus')->insert(['nombre' => 'Administrativos','ruta' => 'administrativos', 'icono' => 'user.png', 'orden' => 1, 'sistema_id' => $id]);
		\DB::table('menus')->insert(['nombre' => 'Docentes','ruta' => 'docentes', 'icono' => 'teacher.png', 'orden' => 2, 'sistema_id' => $id]);
		\DB::table('menus')->insert(['nombre' => 'Alumnos','ruta' => 'alumnos', 'icono' => 'student.png', 'orden' => 3, 'sistema_id' => $id]);
		\DB::table('menus')->insert(['nombre' => 'Horario','ruta' => 'horario', 'icono' => 'calendar.png', 'orden' => 4, 'sistema_id' => $id]);

		$id = \DB::table('sistemas')->insertGetId(['nombre' => 'Sistema', 'icono' => 'excel.png', 'orden' => 2]);
		\DB::table('menus')->insert(['nombre' => 'Usuarios','ruta' => 'usuarios', 'icono' => 'user.png', 'orden' => 1, 'sistema_id' => $id]);
		\DB::table('menus')->insert(['nombre' => 'Permisos','ruta' => 'permisos', 'icono' => 'private.png', 'orden' => 2, 'sistema_id' => $id]);

		$id = \DB::table('sistemas')->insertGetId(['nombre' => 'Reportes', 'icono' => 'excel.png', 'orden' => 3]);
		\DB::table('menus')->insert(['nombre' => 'Reportes','ruta' => 'reportes', 'icono' => 'excel.png', 'orden' => 1, 'sistema_id' => $id]);
	}
}
