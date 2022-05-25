<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
    <link rel="stylesheet" href="{{ '/css/app.css' }}">
    @stack('styles')
    <style>
        .visible-false{
            display: none;
        }
    </style>

</head>
<body class="@yield('body-class')">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N68JV28"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="main">
        @include('includes.header')

        <div id="app" class="">
            @yield('content')
        </div>

        @include('includes.footer')
    </div>

    <script src="{{ '/js/app.js' }}"></script>
    @stack('scripts')
</body>
</html>
