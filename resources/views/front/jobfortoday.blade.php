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

        .facebook {
            background: #3b5998;
        }

        .whatsapp {
            background: #25D366;
        }

        .twitter {
            background: #00acee;
        }

        .padding-y-half {
            padding-top: .5rem;
            padding-bottom: .5rem;
        }

        .padding-x-one {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .swal2-html-container a {
            color: white;
        }

        .swal2-html-container {
            display: flex !important;
            flex-direction: column;
            gap: .5rem;
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
                <button data-post_id="{{ $blog->id }}" type="button" class="btn btn-success earn_btn">BOOST ADS AND
                    EARN</button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function postShared(postId) {
            $.ajax({
                url: "{{ route('user.earn_workflow_income') }}",
                data: {
                    post_id: postId,
                },
                success: function(response) {
                    console.log(response);
                    Swal.fire({
                        icon: response.success,
                        title: response.title,
                        text: response.text,
                        confirmButtonText: 'Access Office',
                    })
                }
            })
        }
        $(document).ready(function() {
            $('.earn_btn').click(function() {
                const postId = $(this).data('post_id');
                console.log(postId);
                Swal.fire({
                    icon: 'info',
                    title: 'Share post!',
                    html: `
                    <div class="facebook padding-y-half padding-x-one" onclick="postShared(${postId})">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('front.jobfortoday', $blog->slug)) }}" target="_blank" rel="noopener noreferrer">Share to Facebook</a>
                    </div>
                    <div class="twitter padding-y-half padding-x-one" onclick="postShared(${postId})">
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode(route('front.jobfortoday', $blog->slug)) }}" target="_blank" rel="noopener noreferrer">Share to Twitter</a>
                    </div>
                    <div class="whatsapp padding-y-half padding-x-one" onclick="postShared(${postId})">
                        <a href="whatsapp://send?text={{ $blog->title . ' - ' . route('front.jobfortoday', $blog->slug) }}" target="_blank" rel="noopener noreferrer">Share to Whatsapp</a>
                    </div>`,
                    showConfirmButton: false
                })
            })
        })
    </script>
@endsection
