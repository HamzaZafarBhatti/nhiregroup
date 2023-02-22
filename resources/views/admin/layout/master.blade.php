<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 5 admin dashboard template & web App ui kit.">
    <meta name="keyword"
        content="LUNO, Bootstrap 5, ReactJs, Angular, Laravel, VueJs, ASP .Net, Admin Dashboard, Admin Theme, HRMS, Projects, Hospital Admin, CRM Admin, Events, Fitness, Music, Inventory, Job Portal">
    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon"> <!-- Favicon-->
    <title>@yield('title') | NHire Group</title>
    <!-- Application vendor css url -->
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/daterangepicker.min.css') }}">
    <!-- project css file  -->
    <link rel="stylesheet" href="{{ asset('assets/css/luno-style.css') }}">
    <!-- Jquery Core Js -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
</head>

<body class="layout-1 font-quicksand" data-luno="theme-blue">

    @include('admin.layout.includes.sidebar')
    <!-- start: body area -->
    <div class="wrapper">
        
        @include('admin.layout.includes.header')

        @include('admin.layout.includes.toolbar')
        <!-- start: page body -->
        <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        @include('admin.layout.includes.footer')
    </div>
    
    <!-- Jquery Page Js -->
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <!-- Plugin Js -->
    <script src="{{ asset('assets/js/bundle/apexcharts.bundle.js') }}"></script>
    <!-- Vendor Script -->
    <script src="{{ asset('assets/js/bundle/apexcharts.bundle.js') }}"></script>
    <script>
        // // LUNO Revenue
        // var options = {
        //     chart: {
        //         height: 260,
        //         type: 'line',
        //         toolbar: {
        //             show: false,
        //         },
        //     },
        //     colors: ['var(--chart-color1)', 'var(--chart-color5)'],
        //     series: [{
        //         name: 'Income',
        //         type: 'line',
        //         data: [440, 505, 414, 671, 227, 413, 201, 352, 752, 320, 257, 160]
        //     }, {
        //         name: 'Expenses',
        //         type: 'line',
        //         data: [23, 42, 35, 27, 43, 22, 17, 31, 22, 22, 12, 16]
        //     }],
        //     stroke: {
        //         width: [2, 2]
        //     },
        //     // labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        //     labels: ['01 Jan 2001', '02 Jan 2001', '03 Jan 2001', '04 Jan 2001', '05 Jan 2001', '06 Jan 2001',
        //         '07 Jan 2001', '08 Jan 2001', '09 Jan 2001', '10 Jan 2001', '11 Jan 2001', '12 Jan 2001'
        //     ],
        //     xaxis: {
        //         type: 'datetime'
        //     },
        //     yaxis: [{
        //         title: {
        //             text: 'Income',
        //         },
        //     }, {
        //         opposite: true,
        //         title: {
        //             text: 'Expenses'
        //         }
        //     }]
        // }
        // var chart = new ApexCharts(document.querySelector("#apex-AudienceOverview"), options);
        // chart.render();
        // // Sales by Category
        // var options = {
        //     chart: {
        //         height: 280,
        //         type: 'donut',
        //     },
        //     dataLabels: {
        //         enabled: false,
        //     },
        //     legend: {
        //         position: 'bottom',
        //         horizontalAlign: 'center',
        //         show: true,
        //     },
        //     colors: ['var(--chart-color1)', 'var(--chart-color2)', 'var(--chart-color3)'],
        //     series: [55, 35, 10],
        // }
        // var chart = new ApexCharts(document.querySelector("#apex-SalesbyCategory"), options);
        // chart.render();
    </script>
</body>

</html>
