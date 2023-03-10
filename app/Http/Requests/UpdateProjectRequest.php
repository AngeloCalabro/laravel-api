<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateProjectRequest extends FormRequest
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
            'name_project' => ['required', Rule::unique('projects')->ignore($this->project)],
            'description' => ['nullable'],
            'cover_image' => ['nullable','image','max:2500'],
            // 'dev_lang' => ['required'],
            'category_id' => 'nullable|exists:categories,id'
        ];
    }
}
