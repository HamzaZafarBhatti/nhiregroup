<?php

namespace App\Http\Controllers;

use App\Models\SalaryWithdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SalaryWithdrawalController extends Controller
{
    //
    public function index()
    {
        $withdraw_requests = SalaryWithdrawal::query();
        if (auth()->user()->role === 'Sub-Admin') {
            $withdraw_requests = $withdraw_requests->where('subadmin_id', auth()->user()->id);
        }
        $withdraw_requests = $withdraw_requests->orderBy('status', 'asc')->latest('id')->get();
        // return $withdraw_requests;
        return view('admin.salary_withdraw_requests.index', compact('withdraw_requests'));
    }

    public function pending()
    {
        $withdraw_requests = SalaryWithdrawal::where('status', 0);
        if (auth()->user()->role === 'Sub-Admin') {
            $withdraw_requests = $withdraw_requests->where('subadmin_id', auth()->user()->id);
        }
        $withdraw_requests = $withdraw_requests->latest('id')->get();
        // return $withdraw_requests;
        return view('admin.salary_withdraw_requests.pending', compact('withdraw_requests'));
    }

    public function accepted()
    {
        $withdraw_requests = SalaryWithdrawal::where('status', 1);
        if (auth()->user()->role === 'Sub-Admin') {
            $withdraw_requests = $withdraw_requests->where('subadmin_id', auth()->user()->id);
        }
        $withdraw_requests = $withdraw_requests->latest('id')->get();
        // return $withdraw_requests;
        return view('admin.salary_withdraw_requests.accepted', compact('withdraw_requests'));
    }

    public function rejected()
    {
        $withdraw_requests = SalaryWithdrawal::where('status', 2);
        if (auth()->user()->role === 'Sub-Admin') {
            $withdraw_requests = $withdraw_requests->where('subadmin_id', auth()->user()->id);
        }
        $withdraw_requests = $withdraw_requests->latest('id')->get();
        // return $withdraw_requests;
        return view('admin.salary_withdraw_requests.rejected', compact('withdraw_requests'));
    }

    public function accept($id)
    {
        try {
            $withdraw_request = SalaryWithdrawal::find($id);
            $withdraw_request->update(['status' => 1]);
            return back()->with('success', 'Request accepted!');
        } catch (\Throwable $th) {
            Log::error('Salary Withdrawal Request Accept Error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong');
        }
    }

    public function reject($id)
    {
        try {
            $withdraw_request = SalaryWithdrawal::find($id);
            $withdraw_request->update(['status' => 2]);
            return back()->with('success', 'Request rejected!');
        } catch (\Throwable $th) {
            Log::error('Salary Withdrawal Request Reject Error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong');
        }
    }
}
