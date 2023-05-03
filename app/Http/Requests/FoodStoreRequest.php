<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FoodStoreRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'name' => ['required','max:255','min:2',Rule::unique('food', 'name')->ignore($this->route('food'))],
            'slug' => ['nullable','max:255','min:2',Rule::unique('food', 'slug')->ignore($this->route('food'))],
            'image' => ['nullable',Rule::unique('food', 'image')->ignore($this->route('food'))],
            'price' => 'required|max:255|min:2',
        ];
    }
}
