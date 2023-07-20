<?php

namespace App\Http\Controllers;

use App\Enum\PayslipStatusEnum;
use App\Http\Requests\Salaryprofile\StoreRequest;
use App\Models\Employer;
use App\Models\EmployerPost;
use App\Models\EmployerPostUser;
use App\Models\Package;
use App\Models\Payslip;
use App\Models\SalaryprofileRequest;
use App\Models\SalaryWithdrawal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Throwable;

class UserController extends Controller
{
    //
    public function dashboard(): View
    {
        $incomes = EmployerPostUser::with('employer')->where('user_id', auth()->user()->id)->latest()->get();
        return view('user.dashboard', compact('incomes'));
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
        $data = $request->validated();
        $prev_req = SalaryprofileRequest::where('user_id', auth()->user()->id)->where('status', 0)->first();
        if($prev_req) {
            return response()->json([
                'status' => 'warning',
                'message' => 'You have already requested for salary dashboard access. Please wait for Admin to validate!',
            ]);
        }
        try {
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

    public function employer_list()
    {
        if (!auth()->user()->salary_dashboard_access) {
            return back()->with('warning', 'Office is locked. Please To access it, you have to pay ₦ ' . auth()->user()->package->salary_dashboard_fee . ' fee.');
        }
        $packages = Package::active()->pluck('name', 'id');
        return view('user.employers.index', compact('packages'));
    }

    public function get_employer_list(Request $request)
    {
        $employers = Employer::with('latest_job')->active();
        if (auth()->user()->package_id === 2) {
            $employers = $employers->where('package_id', $request->package_id);
        }
        if (auth()->user()->package_id === 1) {
            $employers = $employers->where('package_id', auth()->user()->package_id)->limit(3);
        }
        $employers = $employers->latest('id')->get();
        $list = array();
        foreach ($employers as $item) {
            $list[] = [
                'logo' => '<img src="' . $item->get_image . '" alt="' . $item->name . '" class="avatar xl rounded-5">',
                'name' => '<h5 class="text-uppercase d-flex flex-column gap-2">' . $item->name . '<small>Job Payout: ' . $item->get_earning_amount . '</small></h5>',
                'action' => '<a target="_blank" href="' . (!empty($item->latest_job) ? url('https://nhiregroup.com/') . $item->latest_job->slug : null) . '" class="btn btn-success ' . (empty($item->latest_job) ? 'disabled' : '') . '" type="button">Start Job</a>',
            ];
        }
        return response([
            'data' => $list,
        ]);
    }

    public function workflow_income()
    {
        $incomes = EmployerPostUser::with('employer')->where('user_id', auth()->user()->id)->latest()->get();
        return view('user.employers.workflow_income', compact('incomes'));
    }

    public function earn_workflow_income(Request $request)
    {
        if (!Auth::check()) {
            return response([
                'success' => 'warning',
                'message' => 'You are not authenticated!'
            ]);
        }

        $earning = EmployerPostUser::where([
            'user_id' => auth()->user()->id,
            'employer_post_id' => $request->post_id
        ])->first();

        if (!empty($earning)) {
            return response([
                'success' => 'warning',
                'message' => 'You have already done this job!'
            ]);
        }

        $post = EmployerPost::with('employer')->find($request->post_id);
        $res = EmployerPostUser::create([
            'user_id' => auth()->user()->id,
            'employer_post_id' => $request->post_id,
            'employer_id' => $post->employer_id,
            'cashed_out' => 0,
            'amount' => $post->employer->earning_amount,
        ]);

        return response([
            'success' => 'success',
            'message' => 'Congratulations! You have earned ' . $res->get_amount . ' from the job!'
        ]);
    }

    public function transfer_workflow_income_to_nhire_wallet($id)
    {
        $transaction = EmployerPostUser::findOrFail($id);
        $user = User::findOrFail($transaction->user_id);

        if ($transaction->cashed_out) {
            return back()->with('warning', 'You have already cased out this amount!');
        }

        DB::beginTransaction();
        try {
            //code...
            $transaction->update([
                'cashed_out' => 1
            ]);

            $user->update([
                'nhire_wallet' => $user->nhire_wallet + $transaction->amount
            ]);

            DB::commit();

            return back()->with('success', 'Amount has been transferred to your NHIRE MAIN WALLET!');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            Log::error('Transfer Error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function generate_pay_slip()
    {
        $user = auth()->user();
        if (!$user->salary_dashboard_access) {
            return back()->with('warning', 'Generate Pay Slip is locked. Please To access it, you have to pay ₦ ' . $user->package->salary_dashboard_fee . ' fee.');
        }
        $data = [
            'nhire_wallet' => $user->nhire_wallet,
            'earning_wallet' => $user->earning_wallet,
            'payslip_tax' => $user->package->payslip_tax,
        ];
        $expected_earning = $data['nhire_wallet'] + $data['earning_wallet'];
        if ($data['payslip_tax'] > 0) {
            $expected_earning = $expected_earning - ($expected_earning * $data['payslip_tax'] / 100);
        }
        $data['expected_earning'] = $expected_earning;

        return view('user.payslip.generate', $data);
    }
}
