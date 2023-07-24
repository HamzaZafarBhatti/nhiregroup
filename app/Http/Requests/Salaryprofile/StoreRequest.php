<?php

namespace App\Http\Requests\Salaryprofile;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'subadmin_id' => 'required',
            'is_paid' => 'required',
            'image_proof' => 'required_unless:is_paid,0|image',
        ];
    }
}
