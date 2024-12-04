<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FruitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
            public function rules()
        {
            return [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    'regex:/^[a-zA-Z\s]+$/',
                    'unique:fruits,name',
                ],
                'price' => 'required|integer|min:1000',
                'stock' => 'required|boolean',
            ];
        }

        public function messages()
        {
            return [
                'name.required' => 'Nama buah wajib diisi.',
                'name.regex' => 'Nama buah hanya boleh berisi huruf dan spasi.',
                'price.min' => 'Harga buah harus minimal Rp 1000.',
            ];
        }



}
