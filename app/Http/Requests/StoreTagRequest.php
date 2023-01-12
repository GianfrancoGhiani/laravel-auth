<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTagRequest extends FormRequest
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
            'name' => 'required|unique:tags|min:3|max:150',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'A Tag name is required',
            'name.min' => 'The Tag name may be longer than 3 char',
            'name.max' => 'The Tag name may be smaller than 150 char',
            'name.unique:projects' => 'The Tag name is already taken, choose another one',
        ];
    }
}
