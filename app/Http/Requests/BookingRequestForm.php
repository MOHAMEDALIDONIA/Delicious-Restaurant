<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class BookingRequestForm extends FormRequest
{
    protected $redirect = '/#book-a-table';
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
            'name' =>'required|string|max:255|min:4|regex:/^[a-zA-Z].*/',
            'email' =>'required|string|lowercase|email|max:255',
            'phone'=>'required|numeric|digits:11',
            'number_people'=>'required|integer',
            'message'=>'nullable|string',
            'day_booking'=>'required|date|date_format:Y-m-d|after:today',
            'time_booking'=>'required|date_format:H:i',
            'table_id'=>'required|integer',
            'value'=>'required|integer',
            '_token'=>'required|string',
            'stripeToken'=>'required|string'
        ];
    }
}
