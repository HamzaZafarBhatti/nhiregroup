@extends('layouts.master')

@section('title', 'Salary Profile Request')

@section('styles')
@endsection

@section('content')
    <div class="row g-3 row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Salary Profile Request
                    </h5>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('user.validate_salary_profile') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Salary Auditor</label>
                            <select name="subadmin_id" id="subadmin_id" required
                                class="form-control @error('subadmin_id') is-invalid @enderror">
                                <option value="">Select Auditor</option>
                                @foreach ($subadmins as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            @error('subadmin_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Payment Status</label>
                            <select name="is_paid" id="is_paid" required
                                class="form-control @error('is_paid') is-invalid @enderror">
                                <option value="">Select Account Type</option>
                                <option value="1">Yes paid!</option>
                                <option value="0">Not yet!</option>
                            </select>
                            @error('is_paid')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Proof of payment</label>
                            <input type="file" name="image_proof" id="image_proof" class="form-control @error('image_proof') is-invalid @enderror">
                            @error('image_proof')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button class="btn btn-success" type="submit">
                                Confirm
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
