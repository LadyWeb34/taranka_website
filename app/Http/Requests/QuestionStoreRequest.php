<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class QuestionStoreRequest extends FormRequest
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
            'question' => ['required','max:255','min:2', Rule::unique('questions', 'question')->ignore($this->route('question'))],
            'description' => ['required','max:255','min:2', Rule::unique('questions', 'status')->ignore($this->route('question'))],
            'status' => ['required','string']
        ];
    }
}
