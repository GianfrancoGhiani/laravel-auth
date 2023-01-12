<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required|unique:projects|min:3|max:150',
            'overview_image' => 'nullable',
            'content' => 'nullable',
            'tag_id' => 'nullable|exists:tags,id'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'title.min' => 'The title may be longer than 3 char',
            'title.max' => 'The title may be smaller than 150 char',
            'title.unique:projects' => 'The title is already taken, choose another one',
        ];
    }
}
