<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankUser\StoreRequest;
use App\Http\Requests\BankUser\UpdateRequest;
use App\Models\Bank;
use App\Models\BankUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserBankController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();
        $user_banks = BankUser::where('user_id', $user->id)->get();
        return view('user.banks.index', compact('user_banks'));
    }
    public function create()
    {
        $banks = Bank::active()->get();
        return view('user.banks.create', compact('banks'));
    }
    public function store(StoreRequest $request)
    {
        $bank_count = BankUser::where('user_id', $request->user()->id)->count();
        if ($bank_count >= 3) {
            return redirect()->route('user.banks.index')->with('warning', 'You can only add upto 3 Bank accounts!');
        }
        $primary_bank = BankUser::where([
            'user_id' => $request->user()->id,
            'is_primary' => 1
        ])->first();
        if ($primary_bank && $request->is_primary) {
            return redirect()->route('user.banks.index')->with('warning', 'You cannot add two primary bank details!');
        }
        $data = $request->validated();
        if (empty($data['is_primary'])) {
            $data['is_primary'] = 0;
        }
        $data['user_id'] = $request->user()->id;
        try {
            BankUser::insert($data);
            return redirect()->route('user.banks.index')->with('success', 'Bank Details added!');
        } catch (\Throwable $th) {
            Log::error('Bank User Store Error: ' . $th->getMessage());
            return redirect()->route('user.banks.index')->with('error', 'Something went wrong!');
        }
    }
    public function edit($id)
    {
        $bank_detail = BankUser::findOrFail($id);
        $banks = Bank::active()->get();
        return view('user.banks.edit', compact('banks', 'bank_detail'));
    }
    public function update(UpdateRequest $request, $id)
    {
        $bank_detail = BankUser::findOrFail($id);

        $data = $request->validated();
        if (empty($data['is_primary'])) {
            $data['is_primary'] = 0;
        }
        if ($data['is_primary']) {
            $primary_bank = BankUser::where([
                'user_id' => $request->user()->id,
                'is_primary' => 1
            ])->update(['is_primary' => 0]);
            // $primary_bank->update(['is_primary' => 0]);
        }
        try {
            $bank_detail->update($data);
            return redirect()->route('user.banks.index')->with('success', 'Bank Details updated!');
        } catch (\Throwable $th) {
            Log::error('Bank User Update Error: ' . $th->getMessage());
            return redirect()->route('user.banks.index')->with('error', 'Something went wrong!');
        }
    }
    public function destroy($id)
    {
        $item = BankUser::find($id);
        try {
            $item->delete();
            return redirect()->route('user.banks.index')->with('success', 'Bank Details deleted!');
        } catch (\Throwable $th) {
            Log::error('Bank User Delete Error: ' . $th->getMessage());
            return redirect()->route('user.banks.index')->with('error', 'Something went wrong!');
        }
    }
}
