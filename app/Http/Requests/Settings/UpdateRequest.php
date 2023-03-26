<?php

namespace App\Http\Requests\Settings;

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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'site_name' => 'required|string|max:255',
            'site_description' => 'required|string',
            'site_keywords' => 'required',
            'email' => 'required|email',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email_notification' => 'required|boolean'
        ];
    }
}
