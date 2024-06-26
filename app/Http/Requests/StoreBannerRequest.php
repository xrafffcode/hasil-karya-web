<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255|unique:banners',
            'subtitle' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'text_url' => 'required|string|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'image' => 'Gambar',
            'title' => 'Judul',
            'subtitle' => 'Sub Judul',
            'url' => 'Link URL',
            'text_url' => 'Teks URL',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute tidak boleh kosong',
            'string' => ':attribute harus berupa string',
            'max' => ':attribute maksimal :max karakter',
        ];
    }
}
