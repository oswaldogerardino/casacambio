<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            //
            'nombre'   => 'required|min:5|max:255',
            'email'    => 'required|min:5|max:150|unique:users,email',
            'rol'      => 'required',
            'puesto'   => 'required',
            'clave'    => 'required|min:6',
        ];
    }
}
