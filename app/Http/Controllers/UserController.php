<?php

namespace App\Http\Controllers;

use App\Http\Requests\Salaryprofile\StoreRequest;
use App\Models\SalaryprofileRequest;
use App\Models\SalaryWithdrawal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class UserController extends Controller
{
    //
    public function dashboard(): View
    {
        return view('user.dashboard');
    }
    public function salary_dashboard()
    {
        $subadmins = User::select('id', DB::raw("CONCAT(name,' - ',phone) AS name"))->where('role', 'Sub-Admin')->pluck('name', 'id');
        
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
            return response()->json([
                'status' => 'success',
                'message' => 'Salary Dashboard Acess Request submitted successfully!',
            ]);
        } catch (\Throwable $th) {
            Log::error('Salary Dashboard Request Error: ' . $th->getMessage());
            return response()->json([
                'status' => 'danger',
                'message' => 'Something went wrong!',
            ]);
        }
    }

    public function salary_withdraw_request(Request $request)
    {
        try {
            if (!empty(auth()->user()->latest_salary_withdrawal) && auth()->user()->latest_salary_withdrawal->status == 0) {
                return back()->with('warning', 'You have already requested salary withdrawal!');
            }
            if (auth()->user()->points < auth()->user()->package->min_points_to_cashout) {
                return back()->with('warning', 'Not eligible to receive salary. Request for upfront payment!');
            }
            $data['user_id'] = auth()->user()->id;
            $data['subadmin_id'] = $request->subadmin_id;
            SalaryWithdrawal::create($data);
            return response()->json([
                'status' => 'success',
                'message' => 'Salary Withdrawal Request Submitted!',
            ]);
        } catch (\Throwable $th) {
            Log::error('Salary Dashboard Request Error: ' . $th->getMessage());
            return response()->json([
                'status' => 'danger',
                'message' => 'Something went wrong!',
            ]);
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
