<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChefRequestForm extends FormRequest
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
        $rlues= [
           'name'=>'required|string|min:4',
           'title'=>'required|string|max:30|min:4',
           'image'=>'nullable|image|mimes:jpeg,png,jpg,gif',
           'facebook'=>'nullable|string' ,
           'instagram'=>'nullable|string' ,
           'twitter'=>'nullable|string' ,
           'linkedin'=>'nullable|string' ,
        ];
     
        return $rlues;
    }
}
