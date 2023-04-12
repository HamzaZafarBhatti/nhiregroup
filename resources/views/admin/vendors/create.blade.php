@extends('layouts.master')

@section('title', 'Add Vendor')

@section('styles')
@endsection

@section('content')
    <div class="row g-3 row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Add Vendor
                    </h5>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('admin.vendors.store') }}" method="post">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" name="name" required />
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" name="email" required />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Price</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrice">₦</span>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                    value="{{ old('price') }}" name="price" aria-describedby="inputGroupPrice"
                                    required />
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Direct Referral Bonus</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupdirect_ref_bonus">₦</span>
                                <input type="number" class="form-control @error('direct_ref_bonus') is-invalid @enderror"
                                    value="{{ old('direct_ref_bonus') }}" name="direct_ref_bonus"
                                    aria-describedby="inputGroupdirect_ref_bonus" required />
                                @error('direct_ref_bonus')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Indirect Referral Bonus</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupindirect_ref_bonus">₦</span>
                                <input type="number" class="form-control @error('indirect_ref_bonus') is-invalid @enderror"
                                    value="{{ old('indirect_ref_bonus') }}" name="indirect_ref_bonus"
                                    aria-describedby="inputGroupindirect_ref_bonus" required />
                                @error('indirect_ref_bonus')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-select @error('is_active') is-invalid @enderror" name="is_active" required>
                                <option selected disabled value="">Choose Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">E-Pin Prefix</label>
                            <input type="text" class="form-control @error('epin_prefix') is-invalid @enderror"
                                value="{{ old('epin_prefix') }}" name="epin_prefix" required />
                            @error('epin_prefix')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">E-Pin Length</label>
                            <input type="number" class="form-control @error('epin_length') is-invalid @enderror" step="1"
                                value="{{ old('epin_length') }}" name="epin_length" required />
                            @error('epin_length')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Minimum Points Required to Cashout</label>
                            <input type="number" class="form-control @error('min_points_to_cashout') is-invalid @enderror" step=".01"
                                value="{{ old('min_points_to_cashout') }}" name="min_points_to_cashout" required />
                            @error('min_points_to_cashout')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">
                                Add Vendor
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
