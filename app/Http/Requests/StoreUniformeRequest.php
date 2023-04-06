<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUniformeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'descricao'=>'required|unique:uniformes,descricao',
            'cobranca'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'descricao.require'=>'Preenchimento obrigatório',
            'descricao.unique'=>'Este uniforme já foi cadastrado',
            'cobranca.required'=>'Preenchimento obrigatório'
        ];
    }
}
