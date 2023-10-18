<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostPutRequest extends FormRequest
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
            "title"=>"required|max:20",
            "slug"=>"required|max:20",
            "keywords"=>"required|max:30",
            "description"=>"required|max:100",
            "content"=>"required",
            "category_id"=>"required|exists:categories,id",
            "tag_ids"=>"required|array",
            "tag_ids.*"=>"required|exists:tags,id",
            "published"=>"required",
        ];
    }
}
