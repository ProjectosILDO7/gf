<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUniformeRequest extends FormRequest
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
        $id=$this->id ?? "";
        return [
            'descricao'=>"required|unique:uniformes,descricao,{$id},id",
            'cobranca'=>'required'
        ];
    }
    public function messages()
    {

        return [
            'descricao.required'=>"Preenchimento obrigatório",
            'descricao.unique'=>"Este uniforme já foi cadastrado",
            'cobranca.required'=>'Preenchimento obrigatório'
        ];
    }
}
