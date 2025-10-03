<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return true;
        $category = $this->route('category');
        return $category && $category->tasks()->count() === 0;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:categories,name,' . $this->route('category')->id,
            'icon' => 'nullable|string',
            'color' => 'nullable|string|size:7|regex:/^#[0-9A-Fa-f]{6}$/',
        ];
        // this regex:/^#[0-9A-Fa-f]{6}$/ means the color must start with a # followed by exactly six hexadecimal characters (0-9, A-F, a-f).
    }
}
