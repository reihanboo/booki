<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/split.js/0.4.7/split.min.js"></script>
    <title>@yield('title') | luna academy elearning</title>
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/content.css') }}" rel="stylesheet">
    <style>
        .bg-green-main {
            background-color: #2C3639;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    @include('partials.navbar')

    <div class="flex">
        <!-- sidebar -->
        @include('partials.sidebar')

        <div id="content" class="flex-1">
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
</body>

</html>
