<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

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
            'name'        => ['required', 'string', Rule::unique('sub_categories', 'name')->ignore($this->subcategory)],
            'description' => 'nullable|string|max:500',
            'cat_id'      => 'required|exists:categories,id',
        ];
    }


    public function messages()
    {
        return [
            //------------------- Customized method for ValidationException error messages! -------------------//
            // Validation "name"
            'name.required'   => 'The "Name" field is required!',
            'name.string'     => 'The "Name" field must be string!',
            'name.unique'     => 'This sub-category name has already been taken! please try another one.',

            // Validation "description"
            'description.max' => 'The "Description" field must be 500 characters or less!',

            // Validation "cat_id"
            'cat_id.required' => 'The "Category" field is required!',

            //------------------- NOT customized method for ValidationException error messages! -------------------//
            // 'required' => 'The sub-category ":attribute" field is required.',
        ];
    }
}
