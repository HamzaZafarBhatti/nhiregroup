<?php

namespace App\Http\Controllers;

use App\Http\Requests\Settings\UpdateLogoRequest;
use App\Http\Requests\Settings\UpdateRequest;
use App\Models\Setting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use Image;

class SettingController extends Controller
{
    public function edit(): View
    {
        //
        return view('admin.settings.edit');
    }

    public function update(UpdateRequest $request): RedirectResponse
    {
        //
        $setting = Setting::first();
        try {
            $data = $request->except('_token', 'site_keywords');
            $data['site_keywords'] = implode(', ', Arr::pluck(json_decode($request->site_keywords), 'value'));
            cache()->forget('settings');
            $setting->update($data);
            return redirect()->route('admin.settings.edit')->with('success', 'Settings updated successfully!');
        } catch (\Throwable $th) {
            Log::error('Setting Update Error: ' . $th->getMessage());
            return redirect()->route('admin.settings.edit')->with('error', 'Something went wrong!');
        }
    }

    public function update_logos(UpdateLogoRequest $request): RedirectResponse
    {
        //
        $setting = Setting::first();
        try {
            if ($image = $request->file('site_logo')) {
                $filename = 'logo_' . time() . '.' . $image->getClientOriginalExtension();
                $location =  $setting->getLogoPath() . $filename;
                Image::make($image)->save($location);
                $data['site_logo'] = $filename;
                if ($setting->site_logo && file_exists($setting->getLogoPath() . $setting->site_logo)) {
                    unlink($setting->getLogoPath() . $setting->site_logo);
                }
            }
            if ($image = $request->file('site_favicon')) {
                $filename = 'favicon_' . time() . '.' . $image->getClientOriginalExtension();
                $location =  $setting->getFaviconPath() . $filename;
                move_uploaded_file($request->site_favicon, $location);
                $data['site_favicon'] = $filename;
                if ($setting->site_favicon && file_exists($setting->getFaviconPath() . $setting->site_favicon)) {
                    unlink($setting->getFaviconPath() . $setting->site_favicon);
                }
            }
            cache()->forget('settings');
            $setting->update($data);
            return redirect()->route('admin.settings.edit')->with('success', 'Logo updated successfully!');
        } catch (\Throwable $th) {
            Log::error('Setting Update Error: ' . $th->getMessage());
            return redirect()->route('admin.settings.edit')->with('error', 'Something went wrong!');
        }
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
