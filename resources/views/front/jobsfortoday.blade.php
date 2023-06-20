@extends('front.layouts.app')

@section('styles')
    <style>
        .panel-body {
            padding: 15px;
            float: unset;
        }

        .img-container {
            height: 300px;
            overflow: hidden;
            border-radius: 10px;
        }

        .img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .img-container img:hover {
            transform: scale(1.1);
        }

        .panel-title {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
        }

        body.swal2-shown>[aria-hidden="true"] {
            transition: 0.1s filter;
            filter: blur(10px);
        }
    </style>
@endsection

@section('content')
    <div class="pm-column-container pm-containerPadding80">
        <div class="container">
            <div class="row">
                <div class="col-md-12 aboutus">
                    <div class="pm-footer-social-info-container">
                        <h6>JOBS FOR TODAY</h6>
                    </div>
                    <div class="row">
                        @forelse ($jobs as $item)
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">Employer: <span
                                                style="font-weight: bolder">{{ $item->name }}</span></h2>
                                        <h3 class="panel-title">{{ $item->latest_job->title }}</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="img-container">
                                            <img src="{{ $item->get_image }}" alt="{{ $item->latest_job->title }}">
                                        </div>
                                        <div class="blog-details">
                                            <p>{!! Str::limit(strip_tags($item->latest_job->description), 100) !!}</p>
                                        </div>
                                        <div class="">
                                            @auth
                                                <a href="{{ route('front.jobfortoday', $item->latest_job->slug) }}"
                                                    class="text-primary" target="_blank">Read More >></a>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <h1 class="text-primary">Please Login to See <b>TODAY JOBS</b>.</h1>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
