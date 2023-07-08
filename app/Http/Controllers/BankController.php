<?php

namespace App\Http\Controllers;

use App\Http\Requests\Bank\StoreRequest;
use App\Http\Requests\Bank\UpdateRequest;
use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $banks = Bank::latest('id')->get();
        return view('admin.banks.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
            $data = $request->validated();

            Bank::insert($data);
            return back()->with('success', 'Bank added!');
        } catch (\Throwable $th) {
            Log::error('Bank Store Error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank $bank)
    {
        //
        return response()->json($bank);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Bank $bank)
    {
        //
        try {
            $data = $request->validated();
            $bank->update($data);
            return response()->json(['success' => true, 'message' => 'Bank updated!']);
        } catch (\Throwable $th) {
            Log::error('Bank Update Error: ' . $th->getMessage());
            return response()->json(['success' => false, 'message' => 'Something went wrong!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        //
        try {
            $bank->delete();
            return back()->with('success', 'Bank deleted successfully!');
        } catch (\Throwable $th) {
            Log::error('Bank Delete Error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong');
        }
    }
}
