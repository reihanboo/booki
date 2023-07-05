<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/split.js/0.4.7/split.min.js"></script>
    <title>@yield('title') | Signal University Elearning</title>
    @vite('resources/css/app.css')
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/content.css') }}" rel="stylesheet">
    <style>
        .bg-green-main {
            background-color: #2C3639;
        }
        
        body {
            background-color: white !important;
        }
    </style>
    @yield('css_after')
</head>

<body>
    <!-- navbar -->
    @include('partials.navbar')

    <div>
        <!-- sidebar -->
        @include('partials.sidebar')

        <div id="content">
            <div class="container mx-auto">
                <!-- content -->
                @yield('content')
            </div>
        </div>
    </div>

    <!-- le javaScript -->
    <script src="{{ asset('js/toggleSidebar.js') }}"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace()
    </script>
    @yield('js_after')
</body>

</html>
