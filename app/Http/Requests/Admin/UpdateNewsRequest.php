<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:120',
            'sub_title' => 'required|max:120',
            'slug' => 'required|max:120',
            'description' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'category_id' => 'required',
            'news_type_id' => 'required',
            'author_id' => 'required',
            'tag_ids' => 'required',
        ];
    }
}
