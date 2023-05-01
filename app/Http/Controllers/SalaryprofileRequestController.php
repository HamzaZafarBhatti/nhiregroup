<?php

namespace App\Http\Controllers;

use App\Models\SalaryprofileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SalaryprofileRequestController extends Controller
{
    //
    public function index()
    {
        $profile_requests = SalaryprofileRequest::query();
        if (auth()->user()->role === 'Sub-Admin') {
            $profile_requests = $profile_requests->where('subadmin_id', auth()->user()->id);
        }
        $profile_requests = $profile_requests->orderBy('status', 'asc')->latest('id')->get();
        // return $profile_requests;
        return view('admin.profile_requests.index', compact('profile_requests'));
    }

    public function pending()
    {
        $profile_requests = SalaryprofileRequest::where('status', 0);
        if (auth()->user()->role === 'Sub-Admin') {
            $profile_requests = $profile_requests->where('subadmin_id', auth()->user()->id);
        }
        $profile_requests = $profile_requests->latest('id')->get();
        // return $profile_requests;
        return view('admin.profile_requests.pending', compact('profile_requests'));
    }

    public function accepted()
    {
        $profile_requests = SalaryprofileRequest::where('status', 1);
        if (auth()->user()->role === 'Sub-Admin') {
            $profile_requests = $profile_requests->where('subadmin_id', auth()->user()->id);
        }
        $profile_requests = $profile_requests->latest('id')->get();
        // return $profile_requests;
        return view('admin.profile_requests.accepted', compact('profile_requests'));
    }

    public function rejected()
    {
        $profile_requests = SalaryprofileRequest::where('status', 2);
        if (auth()->user()->role === 'Sub-Admin') {
            $profile_requests = $profile_requests->where('subadmin_id', auth()->user()->id);
        }
        $profile_requests = $profile_requests->latest('id')->get();
        // return $profile_requests;
        return view('admin.profile_requests.rejected', compact('profile_requests'));
    }

    public function accept($id)
    {
        DB::beginTransaction();
        try {
            $profile_request = SalaryprofileRequest::with('user')->find($id);
            $profile_request->update(['status' => 1]);
            $profile_request->user->update(['salary_dashboard_access' => 1]);
            DB::commit();
            return back()->with('success', 'Request accepted!');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Salary Dashboard Request Accept Error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong');
        }
    }

    public function reject($id)
    {
        DB::beginTransaction();
        try {
            $profile_request = SalaryprofileRequest::with('user')->find($id);
            $profile_request->update(['status' => 2]);
            DB::commit();
            return back()->with('success', 'Request rejected!');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Salary Dashboard Request Reject Error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong');
        }
    }
}
