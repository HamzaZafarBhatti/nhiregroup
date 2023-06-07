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
    </style>
@endsection

@section('content')
    <div class="pm-column-container pm-containerPadding80">
        <div class="container">
            <div class="row">
                <div class="col-md-12 aboutus">
                    <div class="pm-footer-social-info-container">

                        <h6>WORKSHOP SERVICES</h6>
                    </div>
                </div>
                <div class="row">
                    @foreach ($blogs as $item)
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">{{ $item->title }}</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="img-container">
                                        <img src="{{ $item->get_image }}" alt="{{ $item->title }}">
                                    </div>
                                    <div class="blog-details">
                                        <p>{!! Str::limit(strip_tags($item->description), 100) !!}</p>
                                    </div>
                                    <a href="{{ route('front.workshopservice', $item->slug) }}" class="text-primary"
                                        target="_blank">Read More >></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
