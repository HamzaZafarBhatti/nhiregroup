<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ $settings->site_description }}" />
    <meta name="keyword" content="{{ $settings->site_keywords }}">
    <link rel="shortcut icon"
        href="{{ asset(empty($settings->site_favicon) ? 'assets/img/favicon.ico' : $settings->getFaviconPath() . $settings->site_favicon) }}" />
    <title>{{ $settings->site_name }}</title>

    <link href="{{ asset('assets/front/new/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/front/new/css/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/front/new/css/responsive.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/new/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/new/css/btn.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/new/css/superfish.css') }}" />
    <link href="{{ asset('assets/front/new/css/theme-color-selector.css') }}" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/new/css/owl.carousel.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/new/css/twitterfeed.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/new/css/typicons.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/new/css/animate.css') }}" />
    <link href="{{ asset('assets/front/new/css/forms.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/front/new/css/css') }}" rel="stylesheet" type="text/css" />
    <style>
        .text-uppercase {
            text-transform: uppercase;
        }
        .text-underline {
            text-decoration: underline;
        }
    </style>
    @yield('styles')
</head>

<body>

    <div id="pm_layout_wrapper" class="pm-full-mode">
        @include('front.layouts.includes.header')
        <!-- Testimonial carousel -->
        @include('front.layouts.includes.carousel')

        @yield('content')

    </div>

    @include('front.layouts.includes.footer')

    </div>
    <!-- /pm_layout-wrapper -->

    <script src="{{ asset('assets/front/new/js/jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/front/new/js/jquery.viewport.mini.js') }}"></script>
    <script src="{{ asset('assets/front/new/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assets/front/new/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/front/new/js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('assets/front/new/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/front/new/js/main.js') }}"></script>
    <script src="{{ asset('assets/front/new/js/jquery.tooltip.js') }}"></script>
    <script src="{{ asset('assets/front/new/js/jquery.hoverPanel.js') }}"></script>
    <script src="{{ asset('assets/front/new/js/superfish.js') }}"></script>
    <script src="{{ asset('assets/front/new/js/hoverIntent.js') }}"></script>
    <script src="{{ asset('assets/front/new/js/tinynav.js') }}"></script>
    <script src="{{ asset('assets/front/new/js/jquery.stellar.js') }}"></script>
    <script src="{{ asset('assets/front/new/js/countdown.js') }}"></script>
    <script src="{{ asset('assets/front/new/js/theme-color-selector.js') }}"></script>
    <script src="{{ asset('assets/front/new/js/wow.min.js') }}"></script>

    <p id="back-top" class="visible-lg visible-md visible-sm" style="bottom: -70px;"> </p>

</body>

</html>
