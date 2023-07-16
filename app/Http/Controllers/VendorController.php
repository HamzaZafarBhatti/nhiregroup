<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vendor\StoreRequest;
use App\Http\Requests\Vendor\UpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $vendors = User::where('role', 'Vendor')->latest('id')->get();
        return view('admin.vendors.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('admin.vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        //
        $data = $request->validated();
        $data['name'] = $request->first_name . ' ' . $request->last_name;
        $data['username'] = $request->first_name;
        $data['password'] = bcrypt('password');
        $data['role'] = 'Vendor';
        $data['email_verified_at'] = now();

        User::create($data);

        return to_route('admin.vendors.index')->with('success', 'Vendor is created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        //
        $vendor = User::findOrFail($id);
        return view('admin.vendors.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        //
        $user = User::findOrFail($id);
        $data = $request->validated();
        $data['name'] = $request->first_name . ' ' . $request->last_name;
        $data['username'] = $request->first_name;

        $user->update($data);

        return to_route('admin.vendors.index')->with('success', 'Vendor is updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
        $user = User::findOrFail($id);

        $user->delete();

        return to_route('admin.vendors.index')->with('success', 'Vendor is deleted!');
    }
}
