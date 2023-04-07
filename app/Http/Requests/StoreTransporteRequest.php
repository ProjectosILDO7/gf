<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransporteRequest extends FormRequest
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
            'descricao'=>'required|unique:transportes,descricao',
            'cobranca'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'descricao.required'=>'Preenchimento obrigatório',
            'descricao.unique'=>'A descrição do transporte deve ser único',
            'cobranca.required'=>'Preenchimento obrigatório'
        ];
    }
}
