<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstudanteRequest extends FormRequest
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
            'curso_id'=>'required',
            //'grade_id'=>'required',
            'image'=>'string|nullable',
            'nome'=>'required|string|max:45|min:4',
            'numBI'=>'required|unique:estudantes|min:14|max:14',
        ];
    }
    public function messages()
    {
        return [
            'curso_id.required'=>'Precisas selessionar um curso...!',
            //'grade_id.required'=>'Precisas selessionar uma graduação',
            'nome.required'=>'O campo nome precisa ser preenchido',
            'numBI.required'=>'O campo do BI precisa ser preenchido',
            'numBI.unique'=>'O nº do Bilhete tem que ser único',
            'numBI.min'=>'O nº do Bilhete tem que ter no mínimo 14 carácter',
            'numBI.max'=>'O nº do Bilhete tem que ter no máximo 14 carácter',
            'image.image'=>'Tem de seccionar uma imagem do tipo jpg/png',
        ];
    }
}
