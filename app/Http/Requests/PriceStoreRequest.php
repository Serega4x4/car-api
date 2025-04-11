<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'configuration_id' => 'required|exists:configurations,id',
            'price' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
        ];
    }
}
