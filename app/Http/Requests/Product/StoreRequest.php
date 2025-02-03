<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'article' => 'required|regex:/^[A-Za-z0-9]+$/|unique:products',
            'name' => 'required|string|min:10',
            'status' => 'string|nullable',
            'DATA.Country' => 'string|nullable',
            'DATA.Weight' => 'integer|nullable',
            'DATA.Price' => 'integer|nullable',
        ];
    }

    public function messages()
    {
        return [
            'article.unique' => 'The article already exists',
            'article.regex' => 'The text can contain only numbers and Latin letters',
        ];
    }
}
