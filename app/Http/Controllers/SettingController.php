<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(Setting $setting): View
    {
        //
        return view('admin.settings.edit');
    }

    public function update(Request $request): RedirectResponse
    {
        //
    }

    public function set_theme(Request $request): JsonResponse
    {
        //
        try {
            if ($request->theme === 'dark') {
                auth()->user()->update(['darkmode' => 1]);
                return response()->json(['status' => true, 'message' => 'Dark mode is enabled']);
            } else {
                auth()->user()->update(['darkmode' => 0]);
                return response()->json(['status' => true, 'message' => 'Light mode is enabled']);
            }
        } catch (\Throwable $th) {
            Log::error('Set Theme Error: ' . $th->getMessage());
            return response()->json(['status' => false]);
        }
    }
}
