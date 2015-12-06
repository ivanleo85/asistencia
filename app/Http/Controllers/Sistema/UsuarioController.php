<?php namespace App\Http\Controllers\Sistema;

use App\Http\Requests;
use App\Http\Requests\UsuarioCreateRequest;
use App\Http\Requests\UsuarioEditRequest;
use App\Http\Controllers\Controller;

use App\Permiso;
use App\Rol;
use App\Sucursal;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller {

	public function __construct(){
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	/*
	public function index()
	{
		$usuarios = Usuario::select()->get();
		return view('sistema.usuarios.index', compact('usuarios'));
	}
	*/

	public function administrativos()
	{
		$this->ruta = 'administrativos';
		$this->cargarMenu();
		$titulo = 'Administrativos';
		$usuarios = Usuario::where('rol_id',5)->get();
		return view('sistema.usuarios.index', compact('usuarios','titulo'));
	}

	public function alumnos()
	{
		$this->ruta = 'alumnos';
		$this->cargarMenu();
		$titulo = 'Alumnos';
		$usuarios = Usuario::where('rol_id',4)->get();
		return view('sistema.usuarios.index', compact('usuarios','titulo'));
	}

	public function docentes()
	{
		$this->ruta = 'docentes';
		$this->cargarMenu();
		$titulo = 'Docentes';
		$usuarios = Usuario::where('rol_id',3)->get();
		return view('sistema.usuarios.index', compact('usuarios','titulo'));
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($titulo)
	{
		$nombre = substr($titulo, 0, -1);
		$rol = Rol::where('nombre',$nombre)->first();
		return view('sistema.usuarios.create', compact('titulo','rol'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UsuarioCreateRequest $request)
	{
		$this->cargarImagen($request->file('imgfile'));
		Usuario::create($request->all());
		Session::flash('msg-success', trans('message.store'));
		return redirect(strtolower($request->get('titulo')));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$usuario = Usuario::find($id);
		if(!is_null($usuario)) {
			return view('sistema.usuarios.edit', compact('usuario'));
		}else {
			Session::flash('msg-warning', 'Usuario No Encontrado');
			return redirect('usuarios');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UsuarioEditRequest $request)
	{
		$usuario = Usuario::find($request->get('id'));
		if(!is_null($usuario)) {
			$this->actualizarImagen($request->file('imgfile'), $request->get('prefoto'));
			if (is_null($request->get('password'))) {
				$usuario->fill($request->except('id', 'password'));
			} else {
				$usuario->fill($request->all());
			}
			$usuario->save();
			Session::flash('msg-success', trans('message.update'));
		}else {
			Session::flash('msg-warning', 'Usuario No Encontrado');
		}
		return redirect('usuarios');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$usuario = Usuario::find($id);
		if(!is_null($usuario)) {
			$usuario->delete();
			Session::flash('msg-success', trans('message.delete'));
		}else {
			Session::flash('msg-warning', 'Usuario No Encontrado');
		}
		return redirect('usuarios');
	}
}