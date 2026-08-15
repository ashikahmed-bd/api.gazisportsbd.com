<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PageRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $page = $this->route('page');

        return [
            'title' => ['required', 'string', 'max:255',],
            'slug' => ['required', 'string', 'max:255', Rule::unique('pages', 'slug')->ignore($page?->id),],
            'content' => ['nullable', 'string',],
            'meta_title' => ['nullable', 'string', 'max:255',],
            'meta_description' => ['nullable', 'string',],
            'meta_keywords' => ['nullable', 'string',],
            'active' => ['nullable', 'boolean',],
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('slug')) {
            $this->merge([
                'slug' => Str::slug($this->slug),
            ]);
        }
    }
}
