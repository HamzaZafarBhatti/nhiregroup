<?php

namespace App\Http\Controllers;

use App\Http\Requests\Package\StoreRequest;
use App\Http\Requests\Package\UpdateRequest;
use App\Models\Package;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $packages = Package::all();
        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('admin.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        //
        try {
            Package::create($request->except('_token'));
            return redirect()->route('admin.packages.index')->with('success', 'Package added successfully!');
        } catch (\Throwable $th) {
            Log::error('Package Store Error: ' . $th->getMessage());
            return redirect()->route('admin.packages.index')->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package): View
    {
        //
        return view('admin.packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Package $package): RedirectResponse
    {
        //
        try {
            $package->update($request->except('_token', '_method'));
            return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully!');
        } catch (\Throwable $th) {
            Log::error('Package Update Error: ' . $th->getMessage());
            return redirect()->route('admin.packages.index')->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package): RedirectResponse
    {
        //
        try {
            $package->delete();
            return back()->with('success', 'Package deleted successfully!');
        } catch (\Throwable $th) {
            Log::error('Package Update Error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong');
        }
    }
}
