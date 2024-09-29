<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequestForm extends FormRequest
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
            'image' => 'required|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'image.required' => 'You must upload at least one image.',
            'image.*.image' => 'Each file must be an image.',
            'image.*.mimes' => 'Each image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.*.max' => 'Each image must not be larger than 2 MB.',
        ];
    }
}
