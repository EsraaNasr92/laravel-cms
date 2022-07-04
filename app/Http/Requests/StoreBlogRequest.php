<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => 'required',
            'published_at' => 'nullable',
            'excerpt' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg|max:3048',
            'body' => 'required',
            'category_id' => 'required|numeric'
        ];
    }
}
