<?php

namespace App\Http\Requests\Employer;

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
            'name' => 'required|string',
            'package_id' => 'required',
            'avatar' => 'sometimes|required|image',
            'earning_amount' => 'required|integer',
            'min_amount_to_move' => 'required|integer',
            'is_active' => 'sometimes|boolean'
        ];
    }
}
