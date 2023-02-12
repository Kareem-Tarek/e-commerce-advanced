<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Category;

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
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => ['required', 'string', Rule::unique('categories', 'name')->ignore($this->category)],
            'description' => 'nullable|string|max:500',
        ];
    }


    public function messages()
    {
        return [
            //------------------- Customized method for ValidationException error messages! -------------------//
            // Validation "name"
            'name.required'   => 'The "Name" field is required.',
            'name.string'     => 'The "Name" field must be string.',
            'name.unique'     => 'This category name has already been taken! please try another one.',

            // Validation "description"
            'description.max' => 'The "Description" field must be 500 characters or less.',

            //------------------- NOT customized method for ValidationException error messages! -------------------//
            // 'required' => 'The category ":attribute" field is required.',
        ];
    }
}
