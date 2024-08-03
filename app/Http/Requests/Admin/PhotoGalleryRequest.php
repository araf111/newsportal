<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PhotoGalleryRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'caption.*' => 'nullable|string|max:255', // Allows each element in caption array to be validated individually
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Allows each element in image array to be validated individually
        ];
    }
}
