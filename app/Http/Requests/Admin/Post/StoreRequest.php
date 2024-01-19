<?php

namespace App\Http\Requests\Admin\Post;

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
            'title'=>'required|string',
            'content'=>'required|string',
            'preview_image'=>'required|file',
            'main_image'=>'required|file',
            'category_id'=>'required|integer|exists:categories,id',
            'tag_ids'=>'nullable|array',
            'tag_ids.*'=>'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title should be written',
            'title.string' => 'Title should be string',
            'content.required' => 'Content should be written',
            'content.string' => 'Content should be text format',
            'preview_image.required' => 'Preview image should be ',
            'preview_image.file' => 'Preview image should be file',
            'main_image.required' => 'Main image should be',
            'main_image.file' => 'Main image should be file',
            'category_id.required' => 'Category should be chosen',
            'category_id.integer' => 'Category should be chosen',
            'category_id.exists' => 'Category should be in database',
            'tag_ids.array' => 'It is necessary to send array data'
        ];
    }
}
