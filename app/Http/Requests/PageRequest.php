<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'pageName' => 'required|min:3|max:80',
        ];
    }
    public function messages()
    {
        return [
            'pageName.required' => 'El campo es requerido',
            'pageName.min' => 'Mínimo de 3 letras',
        ];
    }
}
