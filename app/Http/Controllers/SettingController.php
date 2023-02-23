<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(Setting $setting): View
    {
        //
        $settings = Setting::all();
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request, Setting $setting): RedirectResponse
    {
        //
    }
}
