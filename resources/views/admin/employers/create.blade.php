@extends('layouts.master')

@section('title', 'Add Employer')

@section('styles')
@endsection

@section('content')
    <div class="row g-3 row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Add Employer
                    </h5>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('admin.employers.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Package</label>
                            <select class="form-select @error('package_id') is-invalid @enderror" name="package_id" required>
                                <option selected disabled value="">Choose Package</option>
                                @foreach ($packages as $key => $value)
                                    <option value="{{ $key }}" @if(old('package_id') == $key) selected @endif>{{ $value }}</option>
                                @endforeach
                            </select>
                            @error('package_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" name="name" required />
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Earning Amount</label>
                            <input type="number" class="form-control @error('earning_amount') is-invalid @enderror"
                                value="{{ old('earning_amount') }}" name="earning_amount" required />
                            @error('earning_amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Minimum Amount to Move Funds to NHIRE Main Wallet</label>
                            <input type="number" class="form-control @error('min_amount_to_move') is-invalid @enderror"
                                value="{{ old('min_amount_to_move') }}" name="min_amount_to_move" required />
                            @error('min_amount_to_move')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-select @error('is_active') is-invalid @enderror" name="is_active" required>
                                <option selected disabled value="">Choose Status</option>
                                <option value="1" @if(old('is_active')) selected @endif>Active</option>
                                <option value="0" @if(!old('is_active')) selected @endif>Inactive</option>
                            </select>
                            @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Logo</label>
                            <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                                value="{{ old('avatar') }}" name="avatar" required />
                            @error('avatar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">
                                Add Employer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- .row end -->
@endsection

@section('scripts')
@endsection
