<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminBookingRequestForm extends FormRequest
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
            'phone'=>'required|numeric',
            'number_people'=>'required|integer',
            'message'=>'nullable|string',
            'day_booking'=>'required|date|date_format:Y-m-d|after:yesterday',
            'time_booking'=>'required|date_format:H:i',
            'number_table'=>'required|integer',
        ];
    }
}
