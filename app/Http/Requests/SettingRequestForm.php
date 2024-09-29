<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequestForm extends FormRequest
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
            'website_name'=>'required|string',
            'video_url'=>'nullable|string|url:http,https',
            'time_work'=>'required|string',
            'description'=>'required|string',
            'address'=>'required|string',
            'phone'=>'required|string|min:11|max:13|regex:/^[0-9]+$/',
            'email'=>'required|email',
            'facebook'=>'nullable|string',
            'instagram'=>'nullable|string',
            'twitter'=>'nullable|string',
            'linkedin'=>'nullable|string',
        ];
    }
}
