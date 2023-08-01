<?php

namespace App\Http\Requests\EmployerPost;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'employer_id' => 'required|integer',
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'sometimes|required|image',
            'is_active' => 'sometimes|boolean',
            'workers' => 'required|numeric',
            'steps' => 'sometimes|nullable|array',
            'link' => 'sometimes|nullable|string',
        ];
    }
}
