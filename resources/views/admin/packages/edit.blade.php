@extends('layouts.master')

@section('title', 'Edit Package')

@section('styles')
@endsection

@section('content')
    <div class="row g-3 row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Package
                    </h5>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('admin.packages.update', $package->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ $package->name }}" name="name" required />
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Grade</label>
                            <input type="text" class="form-control @error('grade') is-invalid @enderror"
                                value="{{ $package->grade }}" name="grade" required />
                            @error('grade')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-select @error('is_active') is-invalid @enderror" name="is_active" required>
                                <option selected disabled value="">Choose Status</option>
                                <option value="1" @if ($package->is_active) selected @endif>Active</option>
                                <option value="0" @if (!$package->is_active) selected @endif>Inactive</option>
                            </select>
                            @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Points</label>
                            <input type="number" class="form-control @error('points') is-invalid @enderror" step=".1"
                                value="{{ $package->points }}" name="points" required />
                            @error('points')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Price</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrice">₦</span>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                    value="{{ $package->price }}" name="price" aria-describedby="inputGroupPrice"
                                    required />
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Direct Referral Bonus</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupdirect_ref_bonus">₦</span>
                                <input type="number" class="form-control @error('direct_ref_bonus') is-invalid @enderror"
                                    value="{{ $package->direct_ref_bonus }}" name="direct_ref_bonus"
                                    aria-describedby="inputGroupdirect_ref_bonus" required />
                                @error('direct_ref_bonus')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Indirect Referral Bonus</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupindirect_ref_bonus">₦</span>
                                <input type="number" class="form-control @error('indirect_ref_bonus') is-invalid @enderror"
                                    value="{{ $package->indirect_ref_bonus }}" name="indirect_ref_bonus"
                                    aria-describedby="inputGroupindirect_ref_bonus" required />
                                @error('indirect_ref_bonus')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">E-Pin Prefix</label>
                            <input type="text" class="form-control @error('epin_prefix') is-invalid @enderror"
                                value="{{ $package->epin_prefix }}" name="epin_prefix" required />
                            @error('epin_prefix')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">E-Pin Length</label>
                            <input type="number" class="form-control @error('epin_length') is-invalid @enderror"
                                step="1" value="{{ $package->epin_length }}" name="epin_length" required />
                            @error('epin_length')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Minimum Points Required to Cashout</label>
                            <input type="number" class="form-control @error('min_points_to_cashout') is-invalid @enderror"
                                step=".01" value="{{ $package->min_points_to_cashout }}" name="min_points_to_cashout"
                                required />
                            @error('min_points_to_cashout')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Point on Referral</label>
                            <input type="number" step=".1" class="form-control @error('points') is-invalid @enderror"
                                value="{{ $package->points }}" name="points" required />
                            @error('points')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Salary Dashboard Access Fee</label>
                            <input type="number"
                                class="form-control @error('salary_dashboard_fee') is-invalid @enderror"
                                value="{{ $package->salary_dashboard_fee }}" name="salary_dashboard_fee" required />
                            @error('salary_dashboard_fee')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Expire in (months)</label>
                            <input type="number" class="form-control @error('expiry_time') is-invalid @enderror"
                                value="{{ $package->expiry_time }}" name="expiry_time" required />
                            @error('expiry_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Payslip Tax</label>
                            <input type="number" step=".1"
                                class="form-control @error('payslip_tax') is-invalid @enderror"
                                value="{{ $package->payslip_tax }}" name="payslip_tax" required />
                            @error('payslip_tax')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">
                                Update Package
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
