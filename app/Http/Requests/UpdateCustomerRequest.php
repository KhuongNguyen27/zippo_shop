<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'day_of_birth' => 'required|date',
            'address' => 'required',
            'email' => 'required|email|different:old_email_column', // unique phải truyền tên cột để kiểm tra
            'gender' => 'required|numeric',
            'phone' => 'required', // unique phải truyền tên cột để kiểm tra
            'password' => 'required',
            'repeatpassword' => 'required|same:password'
        ];
    }
}
