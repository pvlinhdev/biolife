<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5|max:15',
            'phone' => 'required|min:10|max:15',
            'address' => 'required|min:1|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name phai co',
            'name.min' => 'Do dai phai hon 5 ky tu',
            'name.max' => 'Do dai phai be hon 20 ky tu',
            'phone.required' => 'Phai co so dien thoai ',
            'phone.min' => 'So luong phai lon hon 10 ky tu',
            'phone.max' => 'So luong phai be hon 10 ky tu',
            'address.required' => 'Phai co dia chi cu the',
            'address.min' => 'Do dai phai lon hon 1 ky tu',
            'address.max' => 'Do dai phai be hon 1000 ky tu',
             
        ];
            
    }
}
