<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;


class CategoryRequest extends FormRequest
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
            'name' => 'required|min:1|max:128',
            'description' => 'required|min:0|max:1208'
        ];
    }

    // public function failedValidation(Validator $validator){
     
    //     return redirect()->route('admin.categories.create')->withErrors($validator)->withInput();
    // }

    public function messages()
    {
        return [
            'name.required' => 'Name phai co',
            'name.min' => 'Do dai phai hon 1 ky tu',
            'name.max' => 'Do dai phai be hon 128 ky tu',
            'description.required' => 'Phai co mo ta',
            'description.min' => 'Phải có kí tự',
            'description.max' => 'Do dai phai be hon 1028 ky tu',
        ];
    }
}
