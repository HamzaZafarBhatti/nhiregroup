<?php

namespace App\Http\Controllers;

use App\Enum\WithdrawStatusEnum;
use App\Enum\WithdrawWalletTypeEnum;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WithdrawController extends Controller
{
    public function index()
    {
        $withdraws = Withdraw::with('user:id,username', 'bank_user.bank', 'usdt_wallet:id,wallet_address');
        // if (auth()->user()->role === 'Sub-Admin') {
        //     $withdraws = $withdraws->where('subadmin_id', auth()->user()->id);
        // }
        $withdraws = $withdraws->orderBy('status', 'asc')->latest('id')->get();
        // return $withdraws;
        return view('admin.withdraws.index', compact('withdraws'));
    }

    public function pending()
    {
        $withdraws = Withdraw::with('user:id,username', 'bank_user.bank', 'usdt_wallet:id,wallet_address')->where('status', WithdrawStatusEnum::PENDING);
        // if (auth()->user()->role === 'Sub-Admin') {
        //     $withdraws = $withdraws->where('subadmin_id', auth()->user()->id);
        // }
        $withdraws = $withdraws->latest('id')->get();
        // return $withdraws;
        return view('admin.withdraws.pending', compact('withdraws'));
    }

    public function accepted()
    {
        $withdraws = Withdraw::with('user:id,username', 'bank_user.bank', 'usdt_wallet:id,wallet_address')->where('status', WithdrawStatusEnum::ACCEPTED);
        // if (auth()->user()->role === 'Sub-Admin') {
        //     $withdraws = $withdraws->where('subadmin_id', auth()->user()->id);
        // }
        $withdraws = $withdraws->latest('id')->get();
        // return $withdraws;
        return view('admin.withdraws.accepted', compact('withdraws'));
    }

    public function rejected()
    {
        $withdraws = Withdraw::with('user:id,username', 'bank_user.bank', 'usdt_wallet:id,wallet_address')->where('status', WithdrawStatusEnum::REJECTED);
        // if (auth()->user()->role === 'Sub-Admin') {
        //     $withdraws = $withdraws->where('subadmin_id', auth()->user()->id);
        // }
        $withdraws = $withdraws->latest('id')->get();
        // return $withdraws;
        return view('admin.withdraws.rejected', compact('withdraws'));
    }

    public function accept(Request $request)
    {
        $withdraw = Withdraw::findOrFail($request->id);
        $user = User::findOrFail($withdraw->user_id);
        DB::beginTransaction();
        try {
            $withdraw->update(['status' => WithdrawStatusEnum::ACCEPTED]);

            $amount_with_tax = $withdraw->amount + ($withdraw->amount * $user->package->payslip_tax / 100);
            
            if ($withdraw->wallet_type === WithdrawWalletTypeEnum::EARNING) {
                $user->update([
                    'earning_wallet' => $user->earning_wallet - $amount_with_tax,
                ]);
            }
            if ($withdraw->wallet_type === WithdrawWalletTypeEnum::NHIRE) {
                $user->update([
                    'nhire_wallet' => $user->nhire_wallet - $amount_with_tax,
                ]);
            }
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Request Accepted!',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Withdraw Accept Error: ' . $th->getMessage());
            return response()->json([
                'status' => 'danger',
                'message' => 'Something went wrong!',
            ]);
        }
    }

    public function reject(Request $request)
    {
        try {
            $withdraw = Withdraw::find($request->id);
            $withdraw->update(['status' => WithdrawStatusEnum::REJECTED]);
            return response()->json([
                'status' => 'success',
                'message' => 'Request Rejected!',
            ]);
        } catch (\Throwable $th) {
            Log::error('Withdraw Reject Error: ' . $th->getMessage());
            return response()->json([
                'status' => 'danger',
                'message' => 'Something went wrong!',
            ]);
        }
    }
}
