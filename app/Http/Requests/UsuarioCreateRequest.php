<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioCreateRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'dni' => 'required|min:8|max:8|unique:usuarios,dni',
			'nombres' => 'required',
			'apellidopaterno' => 'required',
			'apellidomaterno' => 'required',
			'sexo' => 'required|in:F,M',
			'celular' => 'required|unique:usuarios,celular',
			'email' => 'required|email|unique:usuarios,email',
			'password' => 'required',
		];
	}

}
