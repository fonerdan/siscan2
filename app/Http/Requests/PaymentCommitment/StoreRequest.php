<?php

namespace App\Http\Requests\PaymentCommitment;

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
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

    public function messages(): array
    {
        return [
            'client_id.required' => 'El campo cliente es requerido',
            'client_id.exists' => 'El cliente seleccionado no existe',
            'amount.required' => 'El campo monto es requerido',
            'amount.numeric' => 'El campo monto debe ser un número',
            'date.required' => 'El campo fecha es requerido',
            'date.date' => 'El campo fecha debe ser una fecha',
        ];
    }
}
