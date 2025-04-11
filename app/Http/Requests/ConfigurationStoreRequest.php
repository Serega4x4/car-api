<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigurationStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'car_id' => 'required|exists:cars,id',
            'name' => 'required|string|max:255',
        ];
    }
}
