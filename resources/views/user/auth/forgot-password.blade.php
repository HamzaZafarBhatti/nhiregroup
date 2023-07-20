@extends('layouts.guest')

@section('title', 'Reset Password')

@section('content')
    <!-- Sign In version 1 -->
    <!-- Body: Body -->
    <div class="body d-flex p-0 p-xl-5">
        <div class="container-fluid">
            @include('alert.index')
            <div class="row g-0 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 col-sm-8">
                    <!-- Form -->
                    <form class="row g-1 rounded-3 p-lg-5 p-4"
                        action="{{ route('user.password.email') }}" method="post" novalidate>
                        @csrf
                        <div>
                            <img style="display: block; margin-left: auto; margin-right: auto;"
                                src="{{ asset('assets/front/new/images/NhireLogo.jpg') }}" alt="" width="200" />
                            <h5 class="text-center fw-bold text-success">
                                Forgot your password? No problem. Just
                                let us know your email address and we will email you a password reset link that will
                                allow you to choose a new one.
                            </h5>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="name@example.com" required @error('email') invalid @enderror>
                                <label>Email/Username</label>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 text-center mt-4 d-grid">
                            <button class="btn btn-lg btn-success lift text-uppercase" type="submit">Email Password Reset
                                Link</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div> <!-- End Row -->
        </div>
    </div>
@endsection



{{-- <x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
