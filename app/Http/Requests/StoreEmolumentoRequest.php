<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmolumentoRequest extends FormRequest
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
            'emolumento'=>'required|unique:emolumentos,emolumento',
            'cobranca'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'emolumento.rquired'=>'O campo do emolumento precisa estar preenchido',
            'cobranca.required'=>'Precisas informar o valor da cobrança deste emolumento',
        ];
    }
}
