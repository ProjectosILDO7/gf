<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatecursoRequest extends FormRequest
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
        $id=$this->id ?? '';
        return [
            'cursos'=>"required|string|max:255|unique:cursos,cursos,{$id},id",
            'cobranca'=>'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            'cursos.required' => 'O campo nome do curso precisa ser preenchido.',
            'cursos.unique' => 'O curso que pretendes alterar, já existe...!',
            'cursos.string' => 'O campo nome do curso precisa ser do tipo texto.',
            'cobranca.numeric' => 'O campo nome da cobrança precisa ser do tipo numérico.',
        ];
    }
}
