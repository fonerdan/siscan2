<?php

namespace App\Http\Requests\ClinicalRecord;

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
            'animal_id' => 'required|integer|exists:animals,id',
            'client_id' => 'required|integer|exists:clients,id',
            'sterilized' => 'required',
            'temp' => 'required|numeric',
            'weight' => 'required|numeric',
            'age' => 'required|numeric',
            'color' => 'required|string',
            'observation' => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

    public function messages(): array  {
        return [
            'animal_id.required' => 'El campo animal es requerido',
            'animal_id.integer' => 'El campo animal debe ser un número entero',
            'animal_id.exists' => 'El campo animal no existe en la base de datos',
            'client_id.required' => 'El campo cliente es requerido',
            'client_id.integer' => 'El campo cliente debe ser un número entero',
            'client_id.exists' => 'El campo cliente no existe en la base de datos',
            'sterilized.required' => 'El campo esterilizado es requerido',
            'temp.required' => 'El campo temperatura es requerido',
            'temp.numeric' => 'El campo temperatura debe ser un número',
            'weight.required' => 'El campo peso es requerido',
            'weight.numeric' => 'El campo peso debe ser un número',
            'age.required' => 'El campo edad es requerido',
            'age.numeric' => 'El campo edad debe ser un número',
            'color.required' => 'El campo color es requerido',
            'color.string' => 'El campo color debe ser una cadena de texto',
            'observation.required' => 'El campo observación es requerido',
            'observation.string' => 'El campo observación debe ser una cadena de texto',
        ];
    }
}
