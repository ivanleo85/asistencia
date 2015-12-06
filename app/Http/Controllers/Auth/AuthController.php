<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioAuthRequest;
use App\Usuario;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function getLogin()
	{
		return view('auth.login');
	}

	public function postLogin(UsuarioAuthRequest $request)
	{
		$mensaje = '';
		$datos = Usuario::where('usuario', $request->get('usuario'))->first();
		if(!is_null($datos)) {
			if ($datos->activo == 1) {
				$usuario = Usuario::find($datos->id);
				if($datos->intentos < 3) {
					if (Auth::attempt(['usuario' => $request->get('usuario'), 'password' => $request->get('password')])) {
						$usuario->intentos = 0;
						$usuario->save();
						return redirect()->intended($this->redirectPath());
					} else {
						$usuario->intentos = $datos->intentos + 1;
						$usuario->save();
					}
					$mensaje = $this->getFailedLoginMessage();
				}else{
					$usuario->activo = '3';
					$usuario->save();
					$mensaje = trans('auth.throttle');
				}
			} else {
				$mensaje = trans('auth.notactive');
			}
		}else{
			$mensaje = trans('auth.notfound');
		}

		return redirect($this->loginPath())
			->withInput($request->only('usuario', 'remember'))
			->withErrors([
				'usuario' => $mensaje,
			]);
	}

	public function getLogout()
	{
		$this->auth->logout();
		Session::flush();
		return redirect($this->loginPath());
	}

	protected function getFailedLoginMessage()
	{
		return trans('auth.failed');
	}

}
