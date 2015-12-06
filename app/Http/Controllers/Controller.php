<?php namespace App\Http\Controllers;

use App\Constante;
use App\Medida;
use App\Menu;
use App\Rol;
use App\Usuario;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	protected $ruta = null;

	public function cargarMenu(){
		if(!Auth::guest()) {
			$this->getMenu();
		}
	}

	public function	getClassActive($id){
		if($this->ruta == '')
			return '';
		else{
			$menu = Menu::where('ruta', $this->ruta)->first();
			if($menu->id == $id)
				return 'active';
			else
				return '';
		}
	}

	public function	getClassDisabled($id){
		$menu = Menu::join('permisos', 'permisos.menu_id', '=', 'menus.id')
				->join('rols', 'rols.id', '=', 'permisos.rol_id')
				->join('usuarios', 'usuarios.rol_id', '=', 'rols.id')
				->where('menus.id', $id)->first();
		if(is_null($menu))
			return 'disabled';
		else
			return '';
	}

	public function getMenu(){
		$respuesta = '';
		if(!is_null(Session::get('rol'))) {
			$menus = Menu::orderBy('menus.orden')->get();
			foreach ($menus as $menu) {
				$class = ' class = "';
				$active = $this->getClassActive($menu->id);
				$disabled = $this->getClassDisabled($menu->id);
				$ruta = '#';
				if($disabled == '')
					$ruta = url($menu->ruta);
				if($active == '' && $disabled == ''){
					$class = '';
				}else{
					$class .= trim($active . ' ' . $disabled . '"');
				}
				$respuesta .=
					'<li' . $class . '>
						<a href="' . $ruta . '" title="' . $menu->nombre . '" style="padding: 12px; 15px;">
							<img src ="' . url('dist/img/' . $menu->icono) . '" style="width:26px">
							' . $menu->nombre . '
						</a>
					</li>';
			}
		}
		Session::put('menu', $respuesta);
	}

	public function getAcceso(){
		$menu = Menu::join('permisos', 'permisos.menu_id', '=', 'menus.id')->join('rols', 'permisos.rol_id', '=', 'rols.id')
			->where('menus.ruta', $this->ruta)->where('rols.id', Session::get('rol')->id)->get();
		if (count($menu) == 1)
			return true;
		else
			return false;
	}

	public function cargarImagen($file){
		if(!is_null($file)){
			$nombre = $file->getClientOriginalName();
			\Storage::disk('local')->put($nombre,  \File::get($file));
		}
	}

	public function actualizarImagen($file, $prefoto){
		if(!is_null($file)){
			if($prefoto != '') {
				if(\Storage::exists($prefoto)) {
					\Storage::delete($prefoto);
				}
			}
			$nombre = $file->getClientOriginalName();
			\Storage::disk('local')->put($nombre,  \File::get($file));
		}
	}

}
