<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'unit_name' => 'required|string|max:100',
            'unit_number' => 'required|string|max:20',
            'project' => 'required|string|max:100',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'area' => 'required|numeric',
            'floor' => 'required|integer',
            'is_available' => 'boolean',
            'order' => 'numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|dimensions:min_width=340,min_height=600,max_width=480,max_height=640',
        ];
    }
}
