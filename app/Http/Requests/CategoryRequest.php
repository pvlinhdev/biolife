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
            'name' => 'required|min:5|max:15',
            'description' => 'required|min:10|max:1000'
        ];
    }

    // public function failedValidation(Validator $validator){
     
    //     return redirect()->route('admin.categories.create')->withErrors($validator)->withInput();
    // }

    public function messages()
    {
        return [
            'name.required' => 'Name phai co',
            'name.min' => 'Do dai phai hon 5 ky tu',
            'name.max' => 'Do dai phai be hon 15 ky tu',
            'description.required' => 'Phai co mo ta',
            'description.min' => 'Do dai phai lon hon 10 ky tu',
            'description.max' => 'Do dai phai be hon 1000 ky tu',

        ];
    }
}
