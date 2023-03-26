@extends('layouts.master')

@section('title', 'Settings')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/tagify/tagify.css') }}">
@endsection

@section('content')
    <div class="row g-3 row-deck vh-100">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="card">
                <div class="card-header py-3 bg-transparent border-bottom-0">
                    <h6 class="card-title mb-0">Settings</h6>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('admin.settings.update') }}" method="post">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Site Name</label>
                            <input type="text" class="form-control @error('site_name') is-invalid @enderror"
                                value="{{ $settings->site_name }}" name="site_name" required />
                            @error('site_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Site Keywords</label>
                            <input name="site_keywords" value="{{ $settings->site_keywords }}"
                                class="@error('site_keywords') is-invalid @enderror" required>
                            @error('site_keywords')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Site Description</label>
                            <textarea name="site_description" id="site_description" cols="30" rows="3"
                                class="form-control @error('site_description') is-invalid @enderror" required>{{ $settings->site_description }}</textarea>
                            @error('site_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                value="{{ $settings->email }}" name="email" required />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                value="{{ $settings->address }}" name="address" required />
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                value="{{ $settings->phone }}" name="phone" required />
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email Notifications</label>
                            <select class="form-select @error('email_notification') is-invalid @enderror"
                                name="email_notification" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="1" @if ($settings->email_notification) selected @endif>Active</option>
                                <option value="0" @if (!$settings->email_notification) selected @endif>Inactive</option>
                            </select>
                            @error('email_notification')
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
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="card">
                <div class="card-header py-3 bg-transparent border-bottom-0">
                    <h6 class="card-title mb-0">Logo & Favicon</h6>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('admin.settings.update_logos') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label">Logo</label>
                            <input class="form-control @error('site_logo') is-invalid @enderror" type="file" accept="image/*"
                                name="site_logo">
                            @if (!empty($settings->site_logo))
                                <span class="text-muted">{{ $settings->site_logo }}</span>
                            @endif
                            @error('site_logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Favicon</label>
                            <input class="form-control @error('site_favicon') is-invalid @enderror" type="file" accept="image/*"
                                name="site_favicon">
                            @if (!empty($settings->site_favicon))
                                <span class="text-muted">{{ $settings->site_favicon }}</span>
                            @endif
                            @error('site_favicon')
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
    <script src="{{ asset('assets/js/bundle/tagify.bundle.js') }}"></script>
    <script>
        $(document).ready(function() {
            // The DOM element you wish to replace with Tagify    12
            var input = document.querySelector('input[name=site_keywords]');
            // initialize Tagify on the above input node reference
            new Tagify(input)
        });
    </script>
@endsection
