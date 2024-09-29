<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequestForm extends FormRequest
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
        $rules= [
            'title'=>'required|string|max:30|min:4',
            'description'=>'required|string',
        ];

        // Check if the request is for the store method
        if ($this->isMethod('post')) {
            // Image is required for store
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif';
        }

        // Check if the request is for the update method
        if ($this->isMethod('put') || $this->isMethod('patch')) {
            // Image is nullable for update
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif';
        }

        return $rules;
    }
}
