<?php

namespace App\Http\Controllers;

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

    public function referrals_direct ()
    {
        $referrals = auth()->user()->direct_refferals;
        return view('user.referrals.direct', compact('referrals'));
    }

    public function referrals_indirect ()
    {
        $referrals = auth()->user()->indirect_refferals;
        return view('user.referrals.indirect', compact('referrals'));
    }
}
