@extends('front.layouts.app')

@section('styles')
    <style>
        .code-result {
            margin-top: 2rem;
        }

        .code-result .valid {
            color: green;
            font-weight: bold;
        }

        .code-result .invalid {
            color: red;
            font-weight: bold;
        }
        
        
        header, .pm-footer-copyright, footer, .pm-containerPadding-top-4 { display: none !important; }
    </style>
@endsection

@section('content')
    <div class="pm-column-container pm-containerPadding80">
        <div class="container">
            @include('alert.index')
            <div class="row">
                <div class="col-md-12 aboutus">
                    <div class="pm-footer-social-info-container">
                        <h6>AUTHENTICATE JOB PERMIT</h6>
                    </div>
                </div>
                <div class="col-md-12 aboutus">
                    <h6>Authenticate your <b>Job Permit</b> on <b>NHIRE</b> below.</h6>
                    <h6>Simply paste your <b class="text-uppercase">Job Permit Code</b>.</h6>
                    <form action="{{ route('front.jobpermit') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Enter Job Permit Code</label>
                            <input type="text" class="form-control" placeholder="Job Permit Code" name="code"
                                value="{{ old('code') }}" required>
                        </div>
                        <button class="btn btn-primary" type="submit">Authenticate Code</button>
                    </form>
                    @if (!empty($code))
                        <div class="code-result">
                            @if ($code->is_purchased)
                                <h5 class="invalid">Jobpass already been used. Jobpass can't be used to secure any job on
                                    NHIRE</h5>
                                <h5>Jobpass is used by <b>{{ $code->used_by->username }}</b></h5>
                            @else
                                <h5 class="valid">Status of Jobpass is valid and can be used to secure jobs on NHIRE</h5>
                            @endif
                            <h4 class="text-underline">Expiry Date</h4>
                            <h5>JOB PERMIT TYPE: {{ $code->package->name }}</h5>
                            <h5>JOB PERMIT will expire in {{ $code->package->expiry_time }} months</h5>
                            <h5>AGENT NAME: {{ $code->user->name }}</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
