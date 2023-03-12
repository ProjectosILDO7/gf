<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorecursoRequest extends FormRequest
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
            'cursos'=>'required|string|max:255|unique:cursos',
            'cobranca'=>'nullable|numeric'
        ];
    }

    public function messages()
    {
        return [
            'cursos.required' => 'O campo nome do curso precisa ser preenchido.',
            'cursos.string' => 'O campo nome do curso precisa ser do tipo texto.',
            'cursos.unique' => 'Este curso já está registado no sistema.',
            'cobranca.numeric' => 'O campo nome da cobrança precisa ser do tipo numérico.',
        ];
    }
}
