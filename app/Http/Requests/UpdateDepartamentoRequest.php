<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartamentoRequest extends FormRequest
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

    public function rules()
    {
        return [
            'departamento'=>"required|string|max:255",
        ];
    }

    public function messages()
    {
        return [
            'departamento.required'=>"Informe o departamento que pretendes registar",
        ];
    }
}
