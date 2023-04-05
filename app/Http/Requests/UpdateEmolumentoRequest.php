<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmolumentoRequest extends FormRequest
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
        $id = $this->id ?? '';
        return [
            'emolumento'=>"required|unique:emolumentos,emolumento,{$id},id",
            'cobranca'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'emolumento.rquired'=>'O campo do emolumento precisa estar preenchido',
            'emolumento.unique'=>'Já existe um emolumento registado com esse nome',
            'cobranca.required'=>'Precisas informar o valor da cobrança deste emolumento',
        ];
    }
}
