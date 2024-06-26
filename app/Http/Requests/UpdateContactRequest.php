<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'full_name' => 'required|string|max:255|unique:contacts,full_name,'.$this->route('contact').',id',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'company_name' => 'required|string',
            'message' => 'required|string',
            'customer_service_id' => 'required|exists:customer_services,id',
        ];
    }

    public function attributes()
    {
        return [
            'full_name' => 'Nama Lengkap',
            'email' => 'Email',
            'phone_number' => 'Nomor Telepon',
            'company_name' => 'Nama Perusahaan',
            'message' => 'Pesan',
            'customer_service_id' => 'Customer Service',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute tidak boleh kosong',
            'string' => ':attribute harus berupa string',
            'max' => ':attribute maksimal :max karakter',
            'email' => ':attribute harus berupa email',
            'unique' => ':attribute sudah terdaftar',
        ];
    }
}
