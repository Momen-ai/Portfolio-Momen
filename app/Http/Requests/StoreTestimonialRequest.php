<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'feedback' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'boolean',
        ];
    }
}
