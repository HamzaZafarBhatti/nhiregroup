<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subadmin\StoreRequest;
use App\Http\Requests\Subadmin\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;

class SubAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subadmins = User::where('role', 'Sub-Admin')->get();
        return view('admin.subadmins.index', compact('subadmins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.subadmins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        try {
            $data = $request->validated();
            $data['role'] = 'Sub-Admin';
            $data['password'] = bcrypt($request->password);
            // return $data;
            $user = User::create($data);
            $user->email_verified_at = now();
            $user->save();
            return redirect()->route('admin.subadmins.index')->with('success', 'Subadmin added successfully!');
        } catch (\Throwable $th) {
            Log::error('Subadmin Store Error: ' . $th->getMessage());
            return redirect()->route('admin.subadmins.index')->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
        $subadmin = User::find($id);
        return view('admin.subadmins.edit', compact('subadmin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $id)
    {
        //
        $subadmin = User::find($id);
        $data = $request->validated();
        if (!empty($request->password)) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $data['password'] = bcrypt($request->password);
        }
        try {
            $subadmin->update($data);
            return redirect()->route('admin.subadmins.index')->with('success', 'Subadmin updated successfully!');
        } catch (\Throwable $th) {
            Log::error('Subadmin Store Error: ' . $th->getMessage());
            return redirect()->route('admin.subadmins.index')->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
        try {
            $subadmin = User::find($id);
            $subadmin->delete();
            return back()->with('success', 'Subadmin deleted successfully!');
        } catch (\Throwable $th) {
            Log::error('Subadmin Delete Error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong');
        }
    }
}
