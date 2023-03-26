<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdategraduacaoRequest extends FormRequest
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
            'grade'=>"required|unique:graduacaos,grade,{$id},id",
        ];
    }

    public function messages()
    {
        return [
            'grade.required'=>'O campo da graduação tem de ser preenchido',
            'grade.unique'=>'A graduação que pretendes alterar já existe...!',
        ];
    }
}
