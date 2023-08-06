<!DOCTYPE html>
<html lang="en" data-theme="@if (Auth::check() && Auth::user()->darkmode == 1) dark @else light @endif">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Nhire group. Jobs Inventory. Work with any company of your choice.">
    <meta name="keyword"
        content="Nhire Group, Job Inventory.">
    <link rel="icon" href="{{ secure_asset('assets/img/favicon.ico') }}" type="image/x-icon"> <!-- Favicon-->
    <title>@yield('title') | NHire Group</title>
    <!-- Application vendor css url -->
    <!-- project css file  -->
    <link rel="stylesheet" href="{{ secure_asset('assets/css/luno-style.css') }}">
    <!-- Jquery Core Js -->
    <script src="{{ secure_asset('assets/js/plugins.js') }}"></script>
    <style>
        :root [data-luno="theme-blue"] {
            --body-color: var(--body-color) !important;
        }

        .btn:hover {
            background-color: #145134;
        }
    </style>
</head>

<body id="layout-1" data-luno="theme-blue">
    <!-- start: body area -->
    <div class="wrapper">
        @yield('content')
    </div>
    <!-- Jquery Page Js -->
    <!-- Jquery Page Js -->
    <script src="{{ secure_asset('assets/js/theme.js') }}"></script>
    <!-- Plugin Js -->
    <!-- Vendor Script -->
    <script>
        var theme = localStorage.getItem("theme");
        document.documentElement.setAttribute("data-theme", theme)
    </script>
</body>

</html>
