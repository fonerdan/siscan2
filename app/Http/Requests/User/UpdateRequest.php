<?php

namespace App\Http\Requests\User;

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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'phone' => 'nullable|numeric|unique:users,phone,' . $this->user->id,
            'ci' => 'nullable|numeric|unique:users,ci,' . $this->user->id,
            'password' => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array{
        return [
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El correo es requerido',
            'email.email' => 'El correo no es válido',
            'email.unique' => 'El correo ya está en uso',
            'phone.required' => 'El teléfono es requerido',
            'phone.unique' => 'El teléfono ya está en uso',
            'ci.required' => 'La cédula es requerida',
            'ci.unique' => 'La cédula ya está en uso',
            'password.required' => 'La contraseña es requerida',
        ];
    }
}
