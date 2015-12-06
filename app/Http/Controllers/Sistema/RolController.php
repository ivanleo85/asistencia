<?php namespace App\Http\Controllers\Sistema;

use App\Http\Requests;
use App\Http\Requests\RolEditRequest;
use App\Http\Controllers\Controller;

use App\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RolController extends Controller {

	public function __construct(){
		$this->middleware('auth');
		$this->ruta = 'roles';
		$this->beforeFilter('@cargarMenu');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = Rol::select()->get();
		return view('sistema.roles.index', compact('roles'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$rol = Rol::find($id);
		if(!is_null($rol)) {
			return view('sistema.roles.edit', compact('rol'));
		}else {
			Session::flash('msg-warning', 'Rol No Encontrado');
			return redirect('roles');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(RolEditRequest $request)
	{
		$rol = Rol::find($request->get('id'));
		if(!is_null($rol)) {
			$rol->fill($request->all());
			$rol->save();
			Session::flash('message', trans('message.update'));
		}else {
			Session::flash('msg-warning', 'Rol No Encontrado');
		}
		return redirect('roles');
	}

}
