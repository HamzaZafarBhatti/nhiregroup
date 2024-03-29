@extends('layouts.master')

@section('title', 'Add Bank Details')

@section('styles')
@endsection

@section('content')
    <div class="row g-3 row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Add Bank Details
                    </h5>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('user.banks.store') }}" method="post">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Bank</label>
                            <select name="bank_id" id="bank_id" required
                                class="form-control @error('bank_id') is-invalid @enderror">
                                <option value="">Select Bank</option>
                                @foreach ($banks as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('bank_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Account Name</label>
                            <input type="text" class="form-control @error('account_name') is-invalid @enderror"
                                value="{{ old('account_name') }}" name="account_name" required />
                            @error('account_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Account Number</label>
                            <input type="text" class="form-control @error('account_number') is-invalid @enderror"
                                value="{{ old('account_number') }}" name="account_number" required />
                            @error('account_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Account Type</label>
                            <select name="account_type" id="account_type" required
                                class="form-control @error('account_type') is-invalid @enderror">
                                <option value="">Select Account Type</option>
                                <option value="current">Current</option>
                                <option value="saving">Saving</option>
                            </select>
                            @error('account_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input @error('is_primary') is-invalid @enderror" type="checkbox"
                                    name="is_primary" role="switch" value="1" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Primary Bank Account?</label>
                                @error('is_primary')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-success" type="submit">
                                Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
