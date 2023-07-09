<?php

namespace App\Http\Controllers;

use App\Enum\WithdrawStatusEnum;
use App\Enum\WithdrawToEnum;
use App\Enum\WithdrawWalletTypeEnum;
use App\Http\Requests\Withdraw\StoreRequest;
use App\Models\BankUser;
use App\Models\CryptoUser;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserWithdrawController extends Controller
{
    //
    public function index()
    {
        $withdraws = Withdraw::where('user_id', auth()->user()->id)->latest('id')->get();
        return view('user.withdraws.index', compact('withdraws'));
    }
    public function request()
    {
        $wallet_types = WithdrawWalletTypeEnum::cases();
        $withdraw_to = WithdrawToEnum::cases();
        $usdt_wallet = CryptoUser::where('user_id', auth()->user()->id)->first();
        $user_banks = BankUser::where('user_id', auth()->user()->id)->orderBy('is_primary', 'desc')->get();
        return view('user.withdraws.request', compact('usdt_wallet', 'user_banks', 'wallet_types', 'withdraw_to'));
    }
    public function store(StoreRequest $request)
    {
        $prev_req = Withdraw::where([
            'user_id' => $request->user()->id,
            'status' => WithdrawStatusEnum::PENDING,
        ])->first();

        if ($prev_req) {
            return back()->with('warning', 'A pending withdraw request is waiting for approval!');
        }

        $data = $request->validated();

        $user = auth()->user();

        if ($data['wallet_type'] === (WithdrawWalletTypeEnum::EARNING)->value && $data['amount'] > $user->earning_wallet) {
            return back()->with('warning', 'You have requested more amount!');
        }

        if ($data['wallet_type'] === (WithdrawWalletTypeEnum::NHIRE)->value && $data['amount'] > $user->nhire_wallet) {
            return back()->with('warning', 'You have requested more amount!');
        }

        $data['user_id'] = $user->id;
        $data['status'] = WithdrawStatusEnum::PENDING;

        try {
            Withdraw::create($data);
            return redirect()->route('user.withdraws.index')->with('success', 'Withdraw request created!');
        } catch (\Throwable $th) {
            //throw $th;
            Log::error('Withdraw Request Error: ' . $th->getMessage());
            return redirect()->route('user.withdraws.index')->with('error', 'Something went wrong!');
        }
    }
}
