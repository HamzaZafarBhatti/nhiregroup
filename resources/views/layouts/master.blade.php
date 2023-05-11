<!DOCTYPE html>
<html lang="en" data-theme="{{ Auth::check() && Auth::user()->darkmode == 1 ? 'dark' : 'light' }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $settings->site_description }}">
    <meta name="keyword" content="{{ $settings->site_keywords }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon"
        href="{{ asset(empty($settings->site_favicon) ? 'assets/img/favicon.ico' : $settings->getFaviconPath() . $settings->site_favicon) }}"
        type="image/x-icon"> <!-- Favicon-->
    <title>@yield('title') | {{ $settings->site_name }}</title>
    <!-- Application vendor css url -->
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/sweetalert2.min.css') }}" />
    <!-- project css file  -->
    <link rel="stylesheet" href="{{ asset('assets/css/luno-style.css') }}">
    <!-- Jquery Core Js -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <style>
        html[data-theme="dark"] .swal2-popup {
            background: #272828;
            color: #fff;
        }

        .scale_up:hover {
            animation: scale_up .25s linear forwards;
        }

        @keyframes scale_up {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.2);
            }
        }
    </style>
</head>

<body class="layout-1 font-quicksand" data-luno="theme-blue">
    @include('layouts.includes.sidebar')
    <!-- start: body area -->
    <div class="wrapper">

        @include('layouts.includes.header')

        @if (Route::is(['admin.dashboard', 'user.dashboard']))
            @include('layouts.includes.toolbar')
        @endif
        <!-- start: page body -->
        <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3 min-vh-100">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        @include('layouts.includes.footer')
    </div>

    <!-- Plugin Js -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <!-- Jquery Page Js -->
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <!-- Plugin Js -->
    <script src="{{ asset('assets/js/bundle/sweetalert2.bundle.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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
        @if (session()->has('success'))
            Toast.fire({
                icon: 'success',
                title: "{{ session('success') }}"
            })
        @endif
        @if (session()->has('error'))
            Toast.fire({
                icon: 'danger',
                title: "{{ session('error') }}"
            })
        @endif
        @if (session()->has('warning'))
            Toast.fire({
                icon: 'warning',
                title: "{{ session('warning') }}"
            })
        @endif

        @if ($user->is_first_login)
            Swal.fire({
                icon: 'info',
                allowOutsideClick: false,
                title: "Welcome to Nhire Group",
                text: "Thank you for registering yourself on this platform.",
                confirmButtonText: "Continue using Nhire"
            }).then((result) => {
                if (result.isConfirmed) {
                    updateIsFirstLogin();
                }
            })

            function updateIsFirstLogin() {
                $.ajax({
                    url: "{{ route('user.updateIsFirstLogin') }}",
                    success: function(response) {
                        console.log(response);
                    }
                })
            }
        @endif


        $(".quick-light-dark").on("click", function() {
            if ("light" == localStorage.getItem("theme")) {
                setTheme("dark")
            } else {
                setTheme("light")
            }
        });

        function setTheme(theme) {
            $.ajax({
                url: "{{ route('settings.set_theme') }}",
                type: "POST",
                data: {
                    theme: theme,
                },
                success: function(data) {
                    if (data.status) {
                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        })
                    } else {
                        Toast.fire({
                            icon: 'danger',
                            title: "Theme cannot be changed."
                        })
                    }
                }
            })
        }
    </script>
    @yield('scripts')
</body>

</html>
