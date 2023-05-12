<?php

namespace App\Http\Controllers;

use App\Http\Requests\Timeslot\StoreRequest;
use App\Http\Requests\Timeslot\UpdateRequest;
use App\Models\Timeslot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TimeslotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $timeslots = Timeslot::latest()->get();
        return view('admin.timeslots.index', compact('timeslots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.timeslots.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        try {
            $data = $request->validated();
            Timeslot::create($data);
            return redirect()->route('admin.timeslots.index')->with('success', 'Timeslot added successfully!');
        } catch (\Throwable $th) {
            Log::error('Timeslot Store Error: ' . $th->getMessage());
            return redirect()->route('admin.timeslots.index')->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Timeslot $timeslot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Timeslot $timeslot)
    {
        //
        return view('admin.timeslots.edit', compact('timeslot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Timeslot $timeslot)
    {
        //
        try {
            $data = $request->validated();
            $timeslot->update($data);
            return redirect()->route('admin.timeslots.index')->with('success', 'Timeslot updated successfully!');
        } catch (\Throwable $th) {
            Log::error('Timeslot Store Error: ' . $th->getMessage());
            return redirect()->route('admin.timeslots.index')->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Timeslot $timeslot)
    {
        //
        try {
            $timeslot->delete();
            return back()->with('success', 'Timeslot deleted successfully!');
        } catch (\Throwable $th) {
            Log::error('Timeslot Delete Error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong');
        }
    }
}
