<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAulaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'      => 'required|string|max:255',
            'edificio_id' => 'required|exists:edificios,id',
            'capacidad'   => 'required|integer|min:1',   // ← esta era la que faltaba
        ];
    }
}
