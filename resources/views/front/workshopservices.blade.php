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

                        <h6>WORKSHOP SERVICES</h6>
                    </div>
                </div>
                <div class="row read-more">
                    @include('front.components.workshopservices_readmore_partial')
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    @guest
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'You are not logged in!',
                    text: 'Do you want to read about the services?',
                    allowOutsideClick: false,
                    input: 'text',
                    inputLabel: 'Please enter your JOB PERMIT CODE',
                    inputValidator: (value) => {
                        if (!value) {
                            return 'JOB PERMIT CODE is required!'
                        }
                    },
                    confirmButtonText: 'Confirm',
                    showLoaderOnConfirm: true,
                    preConfirm: (value) => {
                        return new Promise(function(resolve, reject) {
                            $.ajax({
                                url: "{{ route('front.validate_code') }}",
                                method: 'get',
                                data: {
                                    code: value
                                },
                                success: function(res) {
                                    Swal.hideLoading()
                                    $('.error').remove();
                                    console.log(res.success)
                                    $('.read-more').html(res.html_text)
                                    if (res.success) {
                                        resolve();
                                    } else {
                                        let popup = Swal.getHtmlContainer()
                                        console.log(popup)
                                        $(popup).append(
                                            '<p class="text-danger text-center error">The JOB PERMIT CODE does not match!</p>'
                                        );
                                        reject('Invalid code')
                                    }
                                }
                            })
                        }).catch(err => {
                            return false
                        })
                    }
                })
            })
        </script>
    @endguest
@endsection
