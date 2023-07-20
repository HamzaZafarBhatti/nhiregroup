<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employer\StoreRequest;
use App\Http\Requests\Employer\UpdateRequest;
use App\Models\Employer;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employers = Employer::with('package:id,name')->latest()->get();
        return view('admin.employers.index', compact('employers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $packages = Package::active()->pluck('name', 'id');
        return view('admin.employers.create', compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $data = $request->validated();

        $employer = new Employer();
        $file = $request->file('avatar');
        $avatar = time() . '.' . $file->getClientOriginalExtension();
        $file->move($employer->getImagePath(), $avatar);
        $data['avatar'] = $avatar;

        Employer::create($data);

        return to_route('admin.employers.index')->with('success', 'Employer is created!');
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
    public function edit(Employer $employer)
    {
        //
        $packages = Package::active()->pluck('name', 'id');
        return view('admin.employers.edit', compact('packages', 'employer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Employer $employer)
    {
        //
        $data = $request->validated();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $avatar = time() . '.' . $file->getClientOriginalExtension();
            $request->avatar->move($employer->getImagePath(), $avatar);
            $data['avatar'] = $avatar;
            if (!empty($employer->avatar) && file_exists($employer->getImagePath() . $employer->avatar)) {
                unlink($employer->getImagePath() . $employer->avatar);
            }
        }

        $employer->update($data);

        return to_route('admin.employers.index')->with('success', 'Employer is updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employer $employer)
    {
        //
        if (!empty($employer->avatar) && file_exists($employer->getImagePath() . $employer->avatar)) {
            unlink($employer->getImagePath() . $employer->avatar);
        }
        $employer->delete();
        return to_route('admin.employers.index')->with('success', 'Employer is deleted!');
    }
}
