<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePessoaRequest extends FormRequest
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
            'nome_pessoa' => 'required',
            'cep' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome_pessoa.required' => 'Informe o nome da Pessoa',
            'cep.required' => 'Informe o CEP'
        ];
    }
}
