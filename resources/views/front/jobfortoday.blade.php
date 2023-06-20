@extends('front.layouts.app')

@section('styles')
    <style>
        .blog-image {
            border-radius: 10px;
            overflow: hidden;
            height: 400px;
            margin-bottom: 2rem;
            background: #316c3169;
        }

        .blog-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.5s;
        }

        .blog-image img:hover {
            transform: scale(1.1);
        }
    </style>
@endsection

@section('content')
    <div class="pm-column-container pm-containerPadding80">
        <div class="container">
            <div class="row">
                <div class="col-md-12 aboutus">
                    <div class="pm-footer-social-info-container">
                        <h6 class="text-center">{{ $blog->title }}</h6>
                    </div>
                </div>
            </div>
            <div class="blog-image">
                <img src="{{ $blog->get_image }}" alt="{{ $blog->title }}">
            </div>
            <div class="blog-desription">
                {!! $blog->description !!}
            </div>

            <div class="text-center">
                <a href="#" type="button" class="btn btn-success">BOOST ADS AND EARN</a>
            </div>
        </div>
    </div>
@endsection
