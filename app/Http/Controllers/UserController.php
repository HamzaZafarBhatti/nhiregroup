<?php

namespace App\Http\Controllers;

use App\Http\Requests\Salaryprofile\StoreRequest;
use App\Models\SalaryprofileRequest;
use App\Models\SalaryWithdrawal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class UserController extends Controller
{
    //
    public function dashboard(): View
    {
        return view('user.dashboard');
    }
    public function salary_dashboard(): View
    {
        $subadmins = User::where('role', 'Sub-Admin')->get();
        return view('user.salary_dashboard', compact('subadmins'));
    }

    public function updateIsFirstLogin()
    {
        try {
            auth()->user()->update(['is_first_login' => false]);
            return response('Status updated');
        } catch (\Throwable $th) {
            Log::error('User Status Update Error: ' . $th->getMessage());
            return response('Something went wrong');
        }
    }

    public function validate_salary_profile(StoreRequest $request)
    {
        // return $request;
        try {
            $data = $request->validated();
            $data['user_id'] = auth()->user()->id;
            SalaryprofileRequest::create($data);
            return back()->with('success', 'Salary Dashboard Acess Request submitted successfully!');
        } catch (\Throwable $th) {
            Log::error('Salary Dashboard Request Error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function salary_withdraw_request()
    {
        try {
            if (auth()->user()->latest_salary_withdrawal->status == 0) {
                return back()->with('warning', 'You have already requested salary withdrawal!');
            }
            $data['user_id'] = auth()->user()->id;
            SalaryWithdrawal::create($data);
            return back()->with('success', 'Salary Withdrawal Request Submitted!');
        } catch (\Throwable $th) {
            Log::error('Salary Dashboard Request Error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function referrals_direct()
    {
        $referrals = auth()->user()->direct_refferals;
        return view('user.referrals.direct', compact('referrals'));
    }

    public function referrals_indirect()
    {
        $referrals = auth()->user()->indirect_refferals;
        return view('user.referrals.indirect', compact('referrals'));
    }
}
