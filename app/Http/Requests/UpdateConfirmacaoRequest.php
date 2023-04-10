<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConfirmacaoRequest extends FormRequest
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
            'cobranca'=>"required|unique:confirmacaos,cobranca,{$id},id"
        ];
    }

    public function messages()
    {
        return [
            'cobranca.required'=>'Preencha o campo da cobrança'
        ];
    }
}
