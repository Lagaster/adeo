<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255','unique:blogs,title'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:4024']
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'The title is required',
            'title.string' => 'The title must be a string',
            'title.max' => 'The title must be less than 255 characters',
            'subtitle.string' => 'The subtitle must be a string',
            'subtitle.max' => 'The subtitle must be less than 255 characters',
            'body.required' => 'The blog body is required',
            'body.string' => 'The blog body must be a string',
            'image.image' => 'The image must be an image',
            'image.max' => 'The image must be less than 4MB',
        ];
    }
}
