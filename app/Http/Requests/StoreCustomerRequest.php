<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
        // dd($this->request);
        return [
            'image' => 'required',
            'name' => 'required',
            'day_of_birth' => 'required|date',
            'address' => 'required',
            'email' => 'required|unique:customers,email|email', // unique phải truyền tên cột để kiểm tra
            'gender' => 'required|numeric',
            'phone' => 'required|unique:customers', // unique phải truyền tên cột để kiểm tra
            'password' => 'required',
            'repeatpassword' => 'required|same:password'
        ];
    }
}