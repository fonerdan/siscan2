<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'ci' => 'required|integer|unique:clients,ci,' . $this->client->id,
            'expedition' => 'required|string|max:255',
            'home' => 'nullable|string|max:255',
            'street' => 'nullable|string|max:255',
            'number' => 'nullable|integer',
            'phone' => 'required|integer|unique:clients,phone,' . $this->client->id,
            'reference_phone' => 'nullable|integer|unique:clients,reference_phone,' . $this->client->id,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser una cadena de texto',
            'name.max' => 'El nombre no debe ser mayor a 255 caracteres',
            'ci.required' => 'La cédula de identidad es requerida',
            'ci.integer' => 'La cédula de identidad debe ser un número entero',
            'ci.unique' => 'La cédula de identidad ya está en uso',
            'expedition.required' => 'La expedición es requerida',
            'expedition.string' => 'La expedición debe ser una cadena de texto',
            'expedition.max' => 'La expedición no debe ser mayor a 255 caracteres',
            'home.string' => 'El domicilio debe ser una cadena de texto',
            'home.max' => 'El domicilio no debe ser mayor a 255 caracteres',
            'street.string' => 'La calle debe ser una cadena de texto',
            'street.max' => 'La calle no debe ser mayor a 255 caracteres',
            'number.integer' => 'El número debe ser un número entero',
            'phone.required' => 'El teléfono es requerido',
            'phone.integer' => 'El teléfono debe ser un número entero',
            'phone.unique' => 'El teléfono ya está en uso',
            'reference_phone.integer' => 'El teléfono de referencia debe ser un número entero',
            'reference_phone.unique' => 'El teléfono de referencia ya está en uso',
            'photo.image' => 'La foto debe ser una imagen',
            'photo.mimes' => 'La foto debe ser de tipo: jpeg, png, jpg, gif, svg',
            'photo.max' => 'La foto no debe ser mayor a 2048 kilobytes',
        ];
    }
}
