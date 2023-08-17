<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:40',
            'body' => 'required',
            'thumb' => 'nullable|image',
            'user'  => 'required',
            'categories' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Este campo é obrigatório!',
            'image'    => 'Você tentou enviar uma imagem inválida!'
        ];
    }
}
