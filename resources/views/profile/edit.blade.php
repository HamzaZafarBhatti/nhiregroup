@extends('layouts.master')

@section('title', 'Profile')

@section('styles')
@endsection

@section('content')
    <div class="row g-3">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Profile Information</h5>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('user.profile.update') }}" method="post" novalidate>
                        @csrf
                        @method('patch')
                        <div class="col-md-12">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                value="{{ old('first_name', $user->first_name) }}" name="first_name" required />
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                value="{{ old('last_name', $user->last_name) }}" name="last_name" required />
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $user->email) }}" name="email" required />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Mother Maiden Name</label>
                            <input type="text" class="form-control @error('mother_name') is-invalid @enderror"
                                value="{{ old('mother_name', $user->mother_name) }}" name="mother_name" required />
                            @error('mother_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Nationality</label>
                            <input type="text" class="form-control @error('nationality') is-invalid @enderror"
                                value="{{ old('nationality', $user->nationality) }}" name="nationality" required />
                            @error('nationality')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Religion</label>
                            <input type="text" class="form-control @error('religion') is-invalid @enderror"
                                value="{{ old('religion', $user->religion) }}" name="religion" required />
                            @error('religion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Blood Group</label>
                            <input type="text" class="form-control @error('blood_group') is-invalid @enderror"
                                value="{{ old('blood_group', $user->blood_group) }}" name="blood_group" required />
                            @error('blood_group')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Social Links <small class="text-info">(You can add multiple social links with comma separation.)</small></label>
                            <input type="text" class="form-control @error('social_links') is-invalid @enderror"
                                value="{{ old('social_links', $user->social_links) }}" name="social_links" required />
                            @error('social_links')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" class="form-control @error('dob') is-invalid @enderror"
                                value="{{ old('dob', $user->dob) }}" name="dob" required />
                            @error('dob')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Update Password</h5>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('user.password.update') }}" method="post" novalidate>
                        @csrf
                        @method('put')
                        <div class="col-md-12">
                            <label class="form-label">Current Password</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                name="current_password" required />
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" required />
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" required />
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">
                                Save
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
