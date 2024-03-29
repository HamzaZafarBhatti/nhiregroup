@extends('layouts.guest')

@section('title', 'Sign in')

@section('content')
    <!-- Sign In version 1 -->
    <!-- Body: Body -->
    <div class="body d-flex p-0 p-xl-5">
        <div class="container-fluid">
            @include('alert.index')
            <div class="row g-0 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 col-sm-8">
                    <!-- Form -->
                    <form class="row g-1 rounded-3 p-lg-5 p-4 @if (count($errors) > 0) was-validated @endif"
                        action="{{ route('user.do_login') }}" method="post" novalidate>
                        @csrf
                        <div>
                            <img style="display: block; margin-left: auto; margin-right: auto;"
                                src="{{ asset('assets/front/new/images/NhireLogo.jpg') }}" alt="" width="200" />
                            <h3 class="text-center fw-bold text-success">
                                Account
                                Login
                            </h3>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" name="login" class="form-control" placeholder="name@example.com"
                                    required>
                                <label>Email/Username</label>
                                @error('login')
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
                        <div class="col-12 d-flex justify-content-between mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="Rememberme">
                                <label class="form-check-label" for="Rememberme">Remember me</label>
                            </div>
                            <a class="text-primary small" href="{{ route('user.password.request') }}">Forgot Password?</a>
                        </div>
                        <div class="col-12 text-center mt-4 d-grid">
                            <button class="btn btn-lg btn-success lift text-uppercase" type="submit">Login to
                                Office</button>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <span class="text-muted">Don't have an account yet? <a href="{{ route('user.register') }}">Sign
                                    up Account
                                    here</a></span>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div> <!-- End Row -->
        </div>
    </div>
@endsection
