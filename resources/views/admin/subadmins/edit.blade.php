@extends('layouts.master')

@section('title', 'Edit Subadmin')

@section('styles')
@endsection

@section('content')
    <div class="row row-cols-md-3 row-cols-sm-3 row-cols-1 g-3 mb-3 row-deck">
        <div class="col">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-fill ms-3 text-truncate">
                        <div class="small text-uppercase">Accepted</div>
                        <div><span class="h6 mb-0 fw-bold">{{ $data['all'] }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-fill ms-3 text-truncate">
                        <div class="small text-uppercase">Part Time</div>
                        <div><span class="h6 mb-0 fw-bold">{{ $data['part_time'] }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-fill ms-3 text-truncate">
                        <div class="small text-uppercase">Full Time</div>
                        <div><span class="h6 mb-0 fw-bold">{{ $data['full_time'] }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3 row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Subadmin
                    </h5>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('admin.subadmins.update', $subadmin->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $subadmin->name) }}" name="name" required />
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                value="{{ old('username', $subadmin->username) }}" name="username" required />
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $subadmin->email) }}" name="email" required />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Whatsapp</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone', $subadmin->phone) }}" name="phone" required />
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Timeslot</label>
                            <select name="timeslot" id="timeslot"
                                class="form-control @error('timeslot') is-invalid @enderror" required>
                                <option value="">Select Time Slot</option>
                                <option value="morning">Morning</option>
                                <option value="evening">Evening</option>
                            </select>
                            @error('timeslot')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" />
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" />
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">
                                Update
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
