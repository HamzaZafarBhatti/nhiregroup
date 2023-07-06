<?php

namespace App\Http\Controllers;

use App\Enum\PayslipStatusEnum;
use App\Models\Payslip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PayslipController extends Controller
{
    //
    public function index()
    {
        $payslips = Payslip::query();
        // if (auth()->user()->role === 'Sub-Admin') {
        //     $payslips = $payslips->where('subadmin_id', auth()->user()->id);
        // }
        $payslips = $payslips->orderBy('status', 'asc')->latest('id')->get();
        // return $payslips;
        return view('admin.payslip_requests.index', compact('payslips'));
    }

    public function pending()
    {
        $payslips = Payslip::where('status', PayslipStatusEnum::PENDING);
        // if (auth()->user()->role === 'Sub-Admin') {
        //     $payslips = $payslips->where('subadmin_id', auth()->user()->id);
        // }
        $payslips = $payslips->latest('id')->get();
        // return $payslips;
        return view('admin.payslip_requests.pending', compact('payslips'));
    }

    public function accepted()
    {
        $payslips = Payslip::where('status', PayslipStatusEnum::ACCEPTED);
        // if (auth()->user()->role === 'Sub-Admin') {
        //     $payslips = $payslips->where('subadmin_id', auth()->user()->id);
        // }
        $payslips = $payslips->latest('id')->get();
        // return $payslips;
        return view('admin.payslip_requests.accepted', compact('payslips'));
    }

    public function rejected()
    {
        $payslips = Payslip::where('status', PayslipStatusEnum::REJECTED);
        // if (auth()->user()->role === 'Sub-Admin') {
        //     $payslips = $payslips->where('subadmin_id', auth()->user()->id);
        // }
        $payslips = $payslips->latest('id')->get();
        // return $payslips;
        return view('admin.payslip_requests.rejected', compact('payslips'));
    }

    public function accept(Request $request)
    {
        $payslip = Payslip::findOrFail($request->id);
        $user = User::findOrFail($payslip->user_id);
        DB::beginTransaction();
        try {
            $payslip->update(['status' => PayslipStatusEnum::ACCEPTED]);
            $user->update([
                'ref_bonus' => $user->ref_bonus - $payslip->direct_earning,
                'indirect_ref_bonus' => $user->indirect_ref_bonus - $payslip->indirect_earning,
                'earning_wallet' => $user->earning_wallet + $payslip->expected_earning,
            ]);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Request Accepted!',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Payslip Request Accept Error: ' . $th->getMessage());
            return response()->json([
                'status' => 'danger',
                'message' => 'Something went wrong!',
            ]);
        }
    }

    public function reject(Request $request)
    {
        try {
            $payslip = Payslip::find($request->id);
            $payslip->update(['status' => PayslipStatusEnum::REJECTED]);
            return response()->json([
                'status' => 'success',
                'message' => 'Request Rejected!',
            ]);
        } catch (\Throwable $th) {
            Log::error('Payslip Request Reject Error: ' . $th->getMessage());
            return response()->json([
                'status' => 'danger',
                'message' => 'Something went wrong!',
            ]);
        }
    }
}
