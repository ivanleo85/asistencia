<?php namespace App\Http\Controllers;

use App\Rol;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$rol = Rol::where('id', Auth::user()->rol_id)->first();
		if(!is_null($rol)){
			Session::put('rol', $rol);
			$this->cargarMenu();
			return view('principal');
		}else{
			Session::flash('msg-warning', 'Rol Asignado No Válido');
			return redirect('/auth/logout');
		}
	}

}
