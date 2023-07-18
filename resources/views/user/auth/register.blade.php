@extends('layouts.guest')

@section('title', 'Sign up')

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex p-0 p-xl-5">
        <div class="container-fluid">
            @include('alert.index')
            <div class="row g-0 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 col-sm-8">
                    <!-- Form -->
                    <form class="row g-1 rounded-3 p-lg-5 p-4 @if (count($errors) > 0) was-validated @endif"
                        action="{{ route('user.do_register') }}" method="post" novalidate>
                        @csrf
                        <h3 style="text-align: center;"><strong><img
                                    style="display: block; margin-left: auto; margin-right: auto;"
                                    src="https://nhiregroup.com/assets/front/new/images/2A138CA0-83883.png" alt=""
                                    width="224" height="106" /><span style="color: #008000;">Fill Your Application
                                    Form</span></strong></h3>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                                    value="{{ old('name') }}" required>
                                <label>Name</label>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" name="username"
                                    class="form-control @error('username') is-invalid @enderror" placeholder="Username"
                                    value="{{ old('username') }}" required>
                                <label>Username</label>
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Email address"
                                    value="{{ old('email') }}" required>
                                <label>Email address</label>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                                <label>Password</label>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Password Confirmation" required>
                                <label>Password Confirmation</label>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" name="epin"
                                    class="form-control @error('epin') is-invalid @enderror" placeholder="Jobpass"
                                    value="{{ old('epin') }}" required>
                                <label>Jobpass</label>
                                @error('epin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @if ($referral)
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" name="referral"
                                        class="form-control @error('referral') is-invalid @enderror" placeholder="Coach"
                                        value="{{ $referral }}" id="referral" readonly required>
                                    <label>Coach</label>
                                    @error('referral')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endif
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault"
                                    name="terms_accepted">
                                <label class="form-check-label" for="flexCheckDefault"> I accept the <a href="#"
                                        title="" class="text-primary">Terms and Conditions</a>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 text-center mt-4 d-grid">
                            <button class="btn btn-lg btn-success lift text-uppercase" type="submit">Register
                                and Apply</button>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <span class="text-muted">Don't have an account yet? <a href="{{ route('user.login') }}">Sign
                                    in
                                    here</a></span>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div> <!-- End Row -->
        </div>
    </div>
@endsection
