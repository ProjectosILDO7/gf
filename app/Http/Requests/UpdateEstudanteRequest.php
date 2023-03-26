<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEstudanteRequest extends FormRequest
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
            'curso_id'=>'required',
            'grade_id'=>'required',
            'image'=>'image|nullable',
            'nome'=>'required|string|max:45|min:4',
            'numBI'=>"required|unique:estudantes,numBI,{$id},id",
        ];
    }
    public function messages()
    {
        return [
            'curso_id.required'=>'Precisas selessionar um curso...!',
            'grade_id.required'=>'Precisas selessionar uma graduação',
            'nome.required'=>'O campo nome precisa ser preenchido',
            'numBI.required'=>'O campo do BI precisa ser preenchido',
            'numBI.unique'=>'O nº do Bilhete tem que ser único',
        ];
    }
}
