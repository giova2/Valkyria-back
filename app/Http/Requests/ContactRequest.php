<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
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
            'contacto.nombre' => 'required|regex:/^[a-zA-Z\s]*$/|min:3|max:80',
            'contacto.email' => 'required|email|between:3,80',
            'contacto.asunto' => 'required|regex:/^[a-zA-Z\s0-9]+$/|min:3|max:80',
            'contacto.mensaje' => 'required|between:3,500',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo es requerido',
            'nombre.regex' => 'Solo letras y espacios',
            'nombre.min' => 'Mínimo de 3 caracteres',
            'nombre.max' => 'Máximo de 80 caracteres',
            'email.required' => 'El campo es requerido',
            'email.email' => 'El formato de email es incorrecto',
            'email.between' => 'Entre 3 y 80 caracteres',
            'asunto.required' => 'El campo es requerido',
            'asunto.regex' => 'Solo letras y números',
            'asunto.min' => 'Mínimo de 3 caracteres',
            'asunto.max' => 'Máximo de 80 caracteres',
            'mensaje.required' => 'El campo es requerido',
            'mensaje.between' => 'Entre 3 y 500 caracteres'
        ];
    }
}
