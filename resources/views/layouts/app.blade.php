<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="{{asset('feather/feather.css')}}">
        <link rel="stylesheet" href="{{asset('ti-icons/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('css/vendor.bundle.base.css')}}">
      
        <script src="{{asset('assets/js/jquery.js')}}"></script>
        
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{asset('css/vertical-layout-light/style.css')}}">
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
           

            @yield('content')
            
            @livewireScripts
            <script src="{{asset('js/vendor.bundle.base.js')}}"></script>
             <script src="{{asset('js/off-canvas.js')}}"></script>
             <script src="{{asset('js/hoverable-collapse.js')}}"></script>
             <script src="{{asset('js/template.js')}}"></script>
             <script src="{{asset('js/printThis.js')}}"></script>
             <script src="{{asset('js/settings.js')}}"></script>
             <script src="{{asset('js/todolist.js')}}"></script>
             <script src="{{asset('js/dashboard.js')}}"></script>
                 <script src="{{asset('js/html2pdf.bundle.min.js')}}"></script>
             

             <script src="{{asset('js/Chart.roundedBarCharts.js')}}"></script>
    </body>
</html>
