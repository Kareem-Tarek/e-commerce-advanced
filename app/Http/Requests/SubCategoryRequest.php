<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => 'required|string|unique:sub_categories',
            'description' => 'nullable|string',
            'cat_id'      => 'required',
        ];
    }


    public function messages()
    {
        return [
            //------------------- Customized method for ValidationException error messages! -------------------//
            // Validation "name"
            'name.required' => 'The sub-category "Name" field is required.',
            'name.string'   => 'The sub-category "Name" field must be string.',
            'name.unique'   => 'This sub-category Name has already been taken! please try another one.',

            // Validation "cat_id"
            'cat_id.required' => 'The "Category" field is required.',

            //------------------- NOT customized method for ValidationException error messages! -------------------//
            // 'required' => 'The sub-category ":attribute" field is required.',
        ];
    }
}
