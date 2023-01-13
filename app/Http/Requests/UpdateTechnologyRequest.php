<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTechnologyRequest extends FormRequest
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
            'name' => ['required', 'min:3', Rule::unique('projects')->ignore($this->project)],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name is required',
            'name.unique:technologies' => 'The name must be unique, check the list and try again',
            'name.min:3' => 'The name must be longer than 3 char'
        ];
    }
}
