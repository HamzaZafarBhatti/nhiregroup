@extends('layouts.guest')

@section('title', 'Verify Email')

@section('content')
    <!-- Sign In version 1 -->
    <!-- Body: Body -->
    <div class="body d-flex p-0 p-xl-5">
        <div class="container-fluid">
            <div class="row g-0 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 col-sm-8">
                    <div class="text-center">
                        @include('alert.index')
                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success">
                                <b>
                                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                </b>
                            </div>
                        @endif
                    </div>
                    <!-- Form -->
                    <form class="row g-1 rounded-3 p-lg-5 p-4" action="{{ route('verification.send') }}" method="post">
                        @csrf
                        <div class="col-12 text-center mb-5">
                            <h4>Thanks for signing up!</h4>
                            <span>Before getting started, could you verify your email address by clicking on the link we
                                just emailed to you? If you didn't receive the email, we will gladly send you
                                another.</span>
                        </div>
                        <div class="col-12 text-center mt-4 d-grid">
                            <button class="btn btn-lg bg-primary-gradient lift text-uppercase" type="submit">Resend
                                Verification Email</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div> <!-- End Row -->
        </div>
    </div>
@endsection
{{-- <x-guest-layout>

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('user.logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout> --}}
