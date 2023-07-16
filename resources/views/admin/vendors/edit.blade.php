@extends('layouts.master')

@section('title', 'Edit Vendor')

@section('styles')
@endsection

@section('content')
    <div class="row g-3 row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Vendor
                    </h5>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('admin.vendors.update', $vendor->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                value="{{ old('first_name', $vendor->first_name) }}" name="first_name" required />
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                value="{{ old('last_name', $vendor->last_name) }}" name="last_name" required />
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $vendor->email) }}" name="email" required />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone', $vendor->phone) }}" name="phone" required />
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-select @error('is_active') is-invalid @enderror" name="is_active" required>
                                <option selected disabled value="">Choose Status</option>
                                <option value="1" @if() selected @endif>Active</option>
                                <option value="0" @if() selected @endif>Inactive</option>
                            </select>
                            @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">
                                Update Vendor
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
