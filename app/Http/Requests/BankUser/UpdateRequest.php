<?php

namespace App\Http\Requests\BankUser;

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
            'bank_id' => 'required',
            'account_name' => 'required|string',
            'account_number' => 'required',
            'account_type' => 'required',
            'is_primary' => 'sometimes|required',
        ];
    }
}
