<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'name' => 'required|string',
        'creation' => 'required|date',
        'phone' => 'required|string',
        'corescolhida' => 'required|string',
        'gender' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo é obrigatório',
            'string' => 'Este campo deve ter no máximo 255 caracteres',
            'date' => 'O campo data é obrigatório',
            ];
    }
}