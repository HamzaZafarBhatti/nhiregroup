<?php

namespace App\Http\Requests\Withdraw;

use App\Enum\WithdrawToEnum;
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'wallet_type' => 'required',
            'withdraw_to' => 'required',
            'amount' => 'required|integer',
            'bank_user_id' => 'required_if:withdraw_to,' . (WithdrawToEnum::BANK)->value,
            'usdt_wallet_id' => 'required_if:withdraw_to,' . (WithdrawToEnum::USDT)->value,
        ];
    }
}
