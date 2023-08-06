<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DirectReferralLog;
use App\Models\Epin;
use App\Models\IndirectReferralLog;
use App\Models\Package;
use App\Models\Setting;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
        $referral = $request->referral;
        return view('user.auth.register', compact('referral'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)/* : RedirectResponse|Request */
    {
        return back()->with('warning', 'Enrollment is closed!');
        // return $request;
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username', 'regex:/^\S*$/u'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'epin' => ['required', 'string'],
        ]);
        $parent_id = null;
        if ($request->has('referral')) {
            $request->validate([
                'referral' => ['required', 'string']
            ]);
            $upline = User::where('username', $request->referral)->first();
            if (!$upline) {
                return back()->with('error', 'Referral username is invalid!');
            }
            $parent_id = $upline->id;
        }
        $epin = Epin::where('serial', $request->epin)->first();
        // return $epin;
        if (!$epin) {
            return back()->with('error', 'This Jobpass is invalid!');
        }
        if ($epin->is_purchased == 1) {
            return back()->with('error', 'This Jobpass already been applied and access granted!');
        }

        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'User',
                'parent_id' => $parent_id,
                'package_id' => $epin->package_id,
                'epin_id' => $epin->id,
                'clear_points_at' => now(),
            ]);
            $epin->update(['is_purchased' => 1]);
            if (!empty($parent_id)) {
                $upline_package = Package::find($upline->package_id);
                $downline_package = Package::find($user->package_id);
                switch ($downline_package->grade) {
                    case 10:
                        if ($upline_package->grade == 10) {
                            DirectReferralLog::create([
                                'upline_id' => $upline->id,
                                'downline_id' => $user->id,
                                'amount' => $downline_package->direct_ref_bonus,
                            ]);
                            $upline->update([
                                'ref_bonus' => $upline->ref_bonus + $downline_package->direct_ref_bonus,
                                'earning_wallet' => $upline->earning_wallet + $downline_package->direct_ref_bonus,
                                'points' => $upline->points + $downline_package->points
                            ]);
                            if (!empty($upline->parent) && $upline->parent->package->grade == 10) {
                                IndirectReferralLog::create([
                                    'upline_id' => $upline->parent->id,
                                    'downline_id' => $user->id,
                                    'amount' => $downline_package->indirect_ref_bonus,
                                ]);
                                $upline->parent->update([
                                    'indirect_ref_bonus' => $upline->parent->indirect_ref_bonus + $downline_package->indirect_ref_bonus,
                                    'earning_wallet' => $upline->parent->earning_wallet + $downline_package->indirect_ref_bonus
                                ]);
                            }
                        }
                        break;
                    case 1:
                        DirectReferralLog::create([
                            'upline_id' => $upline->id,
                            'downline_id' => $user->id,
                            'amount' => $downline_package->direct_ref_bonus,
                        ]);
                        $upline->update([
                            'ref_bonus' => $upline->ref_bonus + $downline_package->direct_ref_bonus,
                            'earning_wallet' => $upline->earning_wallet + $downline_package->direct_ref_bonus,
                            'points' => $upline->points + $downline_package->points
                        ]);
                        if (!empty($upline->parent)) {
                            IndirectReferralLog::create([
                                'upline_id' => $upline->parent->id,
                                'downline_id' => $user->id,
                                'amount' => $downline_package->indirect_ref_bonus,
                            ]);
                            $upline->parent->update([
                                'indirect_ref_bonus' => $upline->parent->indirect_ref_bonus + $downline_package->indirect_ref_bonus,
                                'earning_wallet' => $upline->parent->earning_wallet + $downline_package->indirect_ref_bonus
                            ]);
                        }
                        break;
                    default:
                        break;
                }
            }
            DB::commit();

            // event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            Log::error($th->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
