<?php

namespace App\Http\Requests\Animal;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_id' => 'required|exists:clients,id',
            'name' => 'required|string',
            'specie' => 'required|string',
            'race' => 'required|string',
            'gender' => 'required|string',
            'fur' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'client_id.required' => 'El cliente es requerido',
            'client_id.exists' => 'El cliente no existe',
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser una cadena de texto',
            'specie.required' => 'La especie es requerida',
            'specie.string' => 'La especie debe ser una cadena de texto',
            'race.required' => 'La raza es requerida',
            'race.string' => 'La raza debe ser una cadena de texto',
            'gender.required' => 'El género es requerido',
            'gender.string' => 'El género debe ser una cadena de texto',
            'fur.required' => 'El pelaje es requerido',
            'fur.string' => 'El pelaje debe ser una cadena de texto',
            'photo.required' => 'La foto es requerida',
            'photo.image' => 'La foto debe ser una imagen',
            'photo.mimes' => 'La foto debe ser de tipo: jpeg, png, jpg, gif, svg',
            'photo.max' => 'La foto no debe ser mayor a 2048 kilobytes',
        ];
    }
}
