<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\ProductDetail;

class ProductDetailRequest extends FormRequest
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
            'name'        => ['required', 'string', Rule::unique('products_details', 'name')->ignore($this->product_detail)],
            'description' => 'nullable|string|max:500',
            'discount'    => 'nullable|numeric',
            'price'       => 'required|numeric',
            'sub_cat_id'  => 'required|exists:sub_categories,id',
            'brand_name'  => 'required|string',
            'supplier_id' => 'required|exists:users,id',
        ];
    }


    public function messages()
    {
        return [
            //------------------- Customized method for ValidationException error messages! -------------------//
            // Validation "name"
            'name.required'       => 'The "Name" field is required!',
            'name.string'         => 'The "Name" field must be string!',
            'name.unique'         => 'This product name has already been taken! please try another one.',

            // Validation "description"
            'description.max'     => 'The "Description" field must be 500 characters or less!',
            'description.string'  => 'The "Description" field must be string!',

            // Validation "discount"
            'discount.numeric'    => 'The "Discount" field must be numeric!',

            // Validation "price"
            'price.required'      => 'The "Price" field is required!',
            'price.numeric'       => 'The "Price" field must be numeric!',

            // Validation "sub_cat_id"
            'sub_cat_id.required' => 'The "Sub-category" field is required!',

            // Validation "brand_name"
            'brand_name.required' => 'The "Brand Name" field is required!',

            // Validation "brand_name"
            'supplier_id.required' => 'The "Supplier" field is required!',
        ];
    }
}
