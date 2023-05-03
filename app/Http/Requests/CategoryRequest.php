<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','max:255','min:2',Rule::unique('categories', 'name')->ignore($this->route('categories'))],
            'slug' => ['nullable','max:255','min:2',Rule::unique('categories', 'slug')->ignore($this->route('categories'))],
            'image' => ['nullable',Rule::unique('categories', 'image')->ignore($this->route('categories'))]
        ];
    }
}
