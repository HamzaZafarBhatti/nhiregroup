<?php

namespace App\Http\Controllers;

use App\Models\CryptoUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserUsdtWalletController extends Controller
{
    //
    public function index()
    {
        $wallet = CryptoUser::where('user_id', auth()->user()->id)->first();
        if ($wallet) {
            return view('user.usdt_wallet.edit', compact('wallet'));
        }
        return view('user.usdt_wallet.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'wallet_address' => 'required',
        ]);
        $data['user_id'] = $request->user()->id;

        try {
            CryptoUser::create($data);
            return redirect()->route('user.usdt_wallet.index')->with('success', 'USDT wallet details added!');
        } catch (\Throwable $th) {
            //throw $th;
            Log::error('USDT Details Store Request Error: ' . $th->getMessage());
            return redirect()->route('user.usdt_wallet.index')->with('error', 'Something went wrong!');
        }
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'wallet_address' => 'required',
        ]);
        $record = CryptoUser::findOrFail($id);
        try {
            $record->update($data);
            return redirect()->route('user.usdt_wallet.index')->with('success', 'USDT wallet details updated!');
        } catch (\Throwable $th) {
            //throw $th;
            Log::error('USDT Details Update Request Error: ' . $th->getMessage());
            return redirect()->route('user.usdt_wallet.index')->with('error', 'Something went wrong!');
        }
    }
}
