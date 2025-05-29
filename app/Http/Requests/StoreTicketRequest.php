<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreTicketRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => ['required', 'max:100'],
            'descripcion' => ['required', 'max:300'],
            'provincia_id' => ['required', 'integer', 'exists:provincias,id'],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo :attribute es requerido.',
            'descripcion.required' => 'El campo descripción no debe estar vacio.php ',
            'max' => 'El campo :attribute no puede tener más de :max caracteres.',
            'exists' => 'El campo :attribute no es válido.',
            'integer' => 'El campo :attribute debe ser un número entero.'
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'errors' => $validator->errors()
            ], 422)
        );
    }
}
