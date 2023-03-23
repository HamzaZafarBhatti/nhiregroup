@extends('layouts.master')

@section('title', 'Add Package')

@section('styles')
@endsection

@section('content')
    <div class="row g-3 row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Add Package
                    </h5>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('admin.packages.store') }}" method="post">
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
                            <label class="form-label">Grade</label>
                            <input type="text" class="form-control @error('grade') is-invalid @enderror"
                                value="{{ old('grade') }}" name="grade" required />
                            @error('grade')
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
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">
                                Add Package
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
