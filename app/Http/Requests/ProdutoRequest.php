<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'nome_produto' => 'required|min:3|max:255',
            'codigo' => 'required|min:3|max:255',
        ];
    }

    public function messages()
    {
        return [
            'nome_produto.required'          => 'Informe seu nome.',
            'codigo.required'         => 'Informe seu e-mail.',
        ];
    }
}
