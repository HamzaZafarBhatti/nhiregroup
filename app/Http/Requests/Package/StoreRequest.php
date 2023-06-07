<?php

namespace App\Http\Requests\Package;

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
            'name' => 'required|unique:packages',
            'price' => 'required|integer',
            'grade' => 'required|integer',
            'direct_ref_bonus' => 'required|integer',
            'indirect_ref_bonus' => 'required|integer',
            'is_active' => 'required|boolean',
            'epin_prefix' => 'required',
            'epin_length' => 'required|integer',
            'min_points_to_cashout' => 'required|integer',
            'salary_dashboard_fee' => 'required|integer',
            'points' => 'required',
            'expiry_time' => 'required|integer',
        ];
    }
}
