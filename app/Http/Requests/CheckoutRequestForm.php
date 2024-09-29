<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequestForm extends FormRequest
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
            'fullname'=>'required|string|regex:/^[a-zA-Z\s]+$/|min:4',
            'phone'=>'required|numeric|digits:11',
            'address'=>'required|string',
            'instructions'=>'nullable|string'
        ];
    }
}
