<?php

namespace App\Http\Controllers;

use App\Http\Requests\Epin\StoreRequest;
use App\Models\Epin;
use App\Models\Package;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class EpinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $epins = Epin::with('package:id,name')->latest()->paginate(15);
        $packages = Package::select('name', 'id')->active()->get();
        return view('admin.epins.index', compact('epins', 'packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        try {
            $qty = $request->count;
            $package = Package::find($request->package_id);
            // return $plan;

            $chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $now = now();
            $codes = array();
            for ($i = 0; $i < $qty; $i++) {
                $code = $package->epin_prefix . '-' . substr(str_shuffle($chars), 0, $package->epin_length - strlen($package->epin_prefix) - 1);
                $data[] = [
                    'serial' => $code,
                    'package_id' => $request->package_id,
                    'created_at' => $now,
                    'updated_at' => $now,
                    'generated_by' => auth()->user()->id
                ];
                array_push($codes, $code);
            }
            Epin::insert($data);

            $url = 'admin.epins.download';
            Session::put('download_link', $url);
            Session::put('codes', implode("\n", $codes));

            return back()->with('success', 'E-Pins generated successfully!');
        } catch (\Throwable $th) {
            Log::error('Epin Store Error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Epin $epin): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Epin $epin): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Epin $epin): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Epin $epin): RedirectResponse
    {
        //
        try {
            $epin->delete();
            return back()->with('success', 'E-Pin deleted successfully!');
        } catch (\Throwable $th) {
            Log::error('Epin Delete Error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong');
        }
    }

    public function epins_download()
    {
        $codes = Session::get('codes');
        Session::forget(['codes', 'download_link']);
        return response($codes)
            ->withHeaders([
                'Content-Type' => 'text/plain',
                'Cache-Control' => 'no-store, no-cache',
                'Content-Disposition' => 'attachment; filename="latest_codes.txt',
            ]);
    }
}
