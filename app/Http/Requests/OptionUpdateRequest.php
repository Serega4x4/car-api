<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptionUpdateRequest extends FormRequest
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
