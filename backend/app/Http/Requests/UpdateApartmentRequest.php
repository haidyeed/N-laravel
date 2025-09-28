<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApartmentRequest extends FormRequest
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
            'unit_name' => 'string|max:100',
            'unit_number' => 'string|max:20',
            'project' => 'string|max:100',
            'description' => 'nullable|string|max:1000',
            'price' => 'numeric|min:0',
            'bedrooms' => 'integer|min:0',
            'bathrooms' => 'integer|min:0',
            'area' => 'numeric|min:0',
            'floor' => 'integer|min:0',
            'is_available' => 'boolean',
            'order' => 'numeric|min:0',
        ];
    }
}
