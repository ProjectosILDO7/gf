<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMultaRequest extends FormRequest
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
           'cobranca'=>'required|unique:multas,cobranca'
        ];
    }

    public function messages()
    {
        return [
           'cobranca.required'=>'Preenchimento obrigatório',
           'cobranca.unique'=>'Já existe uma multa cadastrada com este valor',
        ];
    }
}
