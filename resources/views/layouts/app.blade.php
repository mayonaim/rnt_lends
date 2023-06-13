<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@stack('title')|RnT</title>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <script script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/dataTables/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    @stack('head')
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        @yield('content-wrapper')

    </div>
    <!-- End of Page Wrapper -->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script script src="{{ asset('vendor/dataTables/js/dataTables.min.js') }}"></script>
    <script script src="{{ asset('vendor/dataTables/js/dataTables.bootstrap5.min.js') }}"></script>
    @stack('body')
</body>

</html>
