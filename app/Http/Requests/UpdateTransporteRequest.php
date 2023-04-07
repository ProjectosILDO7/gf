<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransporteRequest extends FormRequest
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
        $id = $this->id ?? "";
        return [
            'descricao'=>"required|unique:transportes,descricao,{$id},id",
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
