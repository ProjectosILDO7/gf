<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoregraduacaoRequest extends FormRequest
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
            'grade'=>'required|unique:graduacaos',
            'curso_id'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'grade.required'=>'O campo da graduação tem de ser preenchido',
            'grade.unique'=>'Já existe esta graduação em nossos registos...!',
            'curso_id.required'=>'Precisas de associar esta graduação à um curso'
        ];
    }
}
