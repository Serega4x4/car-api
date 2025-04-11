<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptionStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }
}
