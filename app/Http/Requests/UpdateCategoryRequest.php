<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "status"=> "required|string|in:active,suspended",
            "title"=> "required|string|unique:categories,title,except,".$this->id,
            "description"=> "required|string",
            "image"=> "nullable|image|mimes:png,jpg|max:1024",
            "slug"=> "sometimes|string"
        ];
    }
}
