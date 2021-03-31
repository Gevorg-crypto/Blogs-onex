<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'parent_category' => 'nullable|exists:categories,id|integer',
            'title' => 'bail|required|string|unique:categories,title|max:45',
            'sub_category' => 'bail|nullable|array',
            'sub_category.*' => 'integer|exists:categories,id|different:parent_category',
        ];
    }
}
