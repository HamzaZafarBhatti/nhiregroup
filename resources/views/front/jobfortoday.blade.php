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

        .copydiv { display: flex; position: relative; margin: 20px 5px;}
        .copybtn { display: inline-block; position: absolute; right: 5px; top: 4px; }
        .copyfield { display: inline-block; padding: 20px; }
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

            @if($blog->link)
                <div class="input-group copydiv">
                    <input value="{{ $blog->link }}" class="form-control copyfield" id="ref" readonly>
                    <button type="button" class="btn btn-success copybtn" data-copytarget="#ref">Copy</button>
                </div>
            @endif

            @if(count($blog->steps) > 0)
            <h5 class="fw-bold"><u>Steps to perform job</u></h5>
            <ol>
                @forelse($blog->steps as $step)
                    <li>{{ $step->description }}</li>
                @empty
                    No steps for this job
                @endforelse
            </ol>
            @endif


            <div class="text-center">
                <button data-post_id="{{ $blog->id }}" type="button" class="btn btn-success earn_btn">BOOST ADS AND
                    EARN</button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function postShared(postId, sharer) {
            $.ajax({
                url: "{{ route('user.earn_workflow_income') }}",
                data: {
                    post_id: postId,
                    shareMedia: sharer,
                },
                success: function(response) {
                    console.log(response);
                    Swal.fire({
                        icon: response.success,
                        title: response.message,
                        confirmButtonText: 'Access Office',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '{{ route('user.dashboard.main') }}';
                        }
                    })
                }
            })
        }
        $(document).ready(function() {
            $('.earn_btn').click(function() {
                const postId = $(this).data('post_id');
                console.log(postId);
                Swal.fire({
                    imageUrl: '{{ asset('assets/img/share/speak.png') }}',
                    imageWidth: 150,
                    padding: '2em 1em',
                    background: '#CEB247',
                    width: 600,
                    imageAlt: 'Shout Out',
                    title: 'Accelerate Ads!',
                    html: `
                    <div class="padding-y-half padding-x-one" onclick="postShared(${postId}, 'facebook')">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('front.jobfortoday', $blog->slug)) }}" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/img/share/facebook.png') }}" alt="facebook" style="width: 100%;"></a>
                    </div>
                    <div class="padding-y-half padding-x-one" onclick="postShared(${postId}, 'twitter')">
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode(route('front.jobfortoday', $blog->slug)) }}" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/img/share/twitter.png') }}" alt="facebook" style="width: 100%;"></a>
                    </div>
                    <div class="padding-y-half padding-x-one" onclick="postShared(${postId}, 'whatsapp')">
                        <a href="whatsapp://send?text={{ $blog->title . ' - ' . route('front.jobfortoday', $blog->slug) }}" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/img/share/whatsapp.png') }}" alt="facebook" style="width: 100%;"></a>
                    </div>`,
                    showConfirmButton: false
                })
            })
        })
    </script>

    <script>
        'use strict';

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            // timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        document.querySelectorAll('.copybtn').forEach((element)=>{
            element.addEventListener('click', copy, true);
        })

        function copy(e) {
            var
                t = e.target,
                c = t.dataset.copytarget,
                inp = (c ? document.querySelector(c) : null);
            if (inp && inp.select) {
                inp.select();
                try {
                    document.execCommand('copy');
                    inp.blur();
                    Toast.fire({
                        icon: 'success',
                        title: '<p style="color: #0c0b0b; font-size: 18px;">Link Copied Successfully!</p>'
                    })
                }catch (err) {
                    alert(`@lang('Please press Ctrl/Cmd+C to copy')`);
                }
            }
        }
    </script>
@endsection
