<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodRequestForm extends FormRequest
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
            'name'=>'required|string|min:4',
            'price'=>'required|numeric',
            'ingredients'=>'required|string',
            'category_id'=>'required|integer',
        
        ];
                // Check if the request is for the store method
                if ($this->isMethod('post')) {
                    // Image is required for store
                    $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
                }
        
                // Check if the request is for the update method
                if ($this->isMethod('put') || $this->isMethod('patch')) {
                    // Image is nullable for update
                    $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
                }
           return $rules ;    
    }
}
