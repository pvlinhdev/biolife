<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|min:1|max:100',
            'price' => 'required|min:1|max:100',
            'quantity' => 'required|min:1|max:10',
            'desciption' => 'required|min:1|max:10000',
            'category_id' => "required",
            'image'=> "required",

        ];
    }

    // public function failedValidation(Validator $validator){
    //     dd($validator->errors());
    // }

    public function messages()
    {
        return [
            'name.required' => 'Name phai co',
            'name.min' => 'Do dai phai hon 5 ky tu',
            'name.max' => 'Do dai phai be hon 20 ky tu',
            'price.required' => 'Phai co gia tien',
            'price.min' => 'Do dai phai lon hon 1 ky tu',
            'price.max' => 'Do dai phai be hon 10 ky tu',
            'quantity.required' => 'Phai co so luong ',
            'image.required' => 'Phai co hình ảnh ',
            'quantity.min' => 'So luong phai lon hon 1 ky tu',
            'quantity.max' => 'So luong phai be hon 10 ky tu',
            'image.mimes' => 'Phai la loai anh jpeg,jpg,png hoac gif',            
            'description.required' => 'Phai co mo ta',
            'description.min' => 'Do dai phai lon hon 10 ky tu',
            'description.max' => 'Do dai phai be hon 1000 ky tu',
            'category_id.required' => 'Phai co category_id',
             
        ];
            
    }
}
