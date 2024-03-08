<?php

namespace App\Http\Requests\ServiceProvisioContract;

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

    public function rules(): array
    {
        return [
            'client_id' => 'required|exists:clients,id',
            'animal_id' => 'required|exists:animals,id',
            'aproximated_age' => 'required|string',
            'color' => 'required|string',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'amount' => 'required|numeric',
        ];
    }

    public function messages(): array{
        return [
            'client_id.required' => 'El campo cliente es requerido',
            'client_id.exists' => 'El cliente seleccionado no existe',
            'animal_id.required' => 'El campo animal es requerido',
            'animal_id.exists' => 'El animal seleccionado no existe',
            'aproximated_age.required' => 'El campo edad aproximada es requerido',
            'aproximated_age.string' => 'El campo edad aproximada debe ser una cadena de texto',
            'color.required' => 'El campo color es requerido',
            'color.string' => 'El campo color debe ser una cadena de texto',
            'date_start.required' => 'El campo fecha de inicio es requerido',
            'date_start.date' => 'El campo fecha de inicio debe ser una fecha',
            'date_end.required' => 'El campo fecha de fin es requerido',
            'date_end.date' => 'El campo fecha de fin debe ser una fecha',
            'amount.required' => 'El campo monto es requerido',
            'amount.numeric' => 'El campo monto debe ser un número',
        ];
    }
}
