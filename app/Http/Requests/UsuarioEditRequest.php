<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Http\Requests;

class UsuarioEditRequest extends Request {

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
			'dni' => 'required|min:8|max:8|unique:usuarios,dni,' . Request::input('id'),
			'nombres' => 'required',
			'apellidopaterno' => 'required',
			'apellidomaterno' => 'required',
				'sexo' => 'required|in:F,M',
			'celular' => 'required|unique:usuarios,celular,' . Request::input('id'),
			'email' => 'required|email|unique:usuarios,email,' . Request::input('id'),
		];
	}

}
