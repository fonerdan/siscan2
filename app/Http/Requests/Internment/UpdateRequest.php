<?php

namespace App\Http\Requests\Internment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'client_id' => 'required|exists:clients,id',
            'animal_id' => 'required|exists:animals,id',
            'doctor' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'client_id.required' => 'El campo cliente es obligatorio',
            'client_id.exists' => 'El cliente seleccionado no existe',
            'animal_id.required' => 'El campo animal es obligatorio',
            'animal_id.exists' => 'El animal seleccionado no existe',
            'doctor.required' => 'El campo doctor es obligatorio',
            'doctor.string' => 'El campo doctor debe ser una cadena de texto',
        ];
    }
}
