<?php

namespace App\Http\Requests\SedationAnesthesia;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'detail' => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array{
        return [
            'client_id.required' => 'El campo cliente es obligatorio',
            'client_id.exists' => 'El cliente seleccionado no existe',
            'animal_id.required' => 'El campo animal es obligatorio',
            'animal_id.exists' => 'El animal seleccionado no existe',
            'detail.required' => 'El campo detalle es obligatorio',
            'detail.string' => 'El campo detalle debe ser una cadena de texto',
        ];
    }
}
