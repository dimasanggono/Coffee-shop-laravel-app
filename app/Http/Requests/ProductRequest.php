<?php

namespace App\Http\Requests;

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
            'name_product' => 'required|max:50',
            'id_categories' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg',
        ];
    }
}
