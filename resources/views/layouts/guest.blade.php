<!DOCTYPE html>
<html lang="en" data-theme="@if (Auth::check() && Auth::user()->darkmode == 1) dark @else light @endif">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 5 admin dashboard template & web App ui kit.">
    <meta name="keyword"
        content="LUNO, Bootstrap 5, ReactJs, Angular, Laravel, VueJs, ASP .Net, Admin Dashboard, Admin Theme, HRMS, Projects, Hospital Admin, CRM Admin, Events, Fitness, Music, Inventory, Job Portal">
    <link rel="icon" href="{{ secure_asset('assets/img/favicon.ico') }}" type="image/x-icon"> <!-- Favicon-->
    <title>@yield('title') | NHire Group</title>
    <!-- Application vendor css url -->
    <!-- project css file  -->
    <link rel="stylesheet" href="{{ secure_asset('assets/css/luno-style.css') }}">
    <!-- Jquery Core Js -->
    <script src="{{ secure_asset('assets/js/plugins.js') }}"></script>
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
