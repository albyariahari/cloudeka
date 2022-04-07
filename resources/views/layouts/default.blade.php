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
