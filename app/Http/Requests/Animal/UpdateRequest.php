<?php

namespace App\Http\Requests\Animal;

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
            'name' => 'required|string',
            'specie' => 'required|string',
            'race' => 'required|string',
            'gender' => 'required|string',
            'fur' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
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
            'name.required' => 'El campo nombre es requerido',
            'name.string' => 'El campo nombre debe ser un texto',
            'specie.required' => 'El campo especie es requerido',
            'specie.string' => 'El campo especie debe ser un texto',
            'race.required' => 'El campo raza es requerido',
            'race.string' => 'El campo raza debe ser un texto',
            'gender.required' => 'El campo género es requerido',
            'gender.string' => 'El campo género debe ser un texto',
            'fur.required' => 'El campo pelaje es requerido',
            'fur.string' => 'El campo pelaje debe ser un texto',
            'photo.image' => 'El archivo debe ser una imagen',
            'photo.mimes' => 'El archivo debe ser una imagen de tipo: jpeg, png, jpg, gif, svg',
            'photo.max' => 'El archivo no debe pesar más de 2048 kilobytes',
        ];
    }
}
