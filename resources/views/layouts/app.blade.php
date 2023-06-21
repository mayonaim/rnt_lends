<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/img/icon-rnt.png">
    <title>@stack('title')RnT</title>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <script script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <link rel="stylesheet" href="">

    <style>
        * {
            font-family: "Montserrat",  !important;
        }
    </style>

    <link href="{{ asset('vendor/dataTables/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

    @if (session('notifikasi'))
        <script>
            Swal.fire({
                text: '{{ session('notifikasi') }}',
                icon: '{{ session('type') }}',
                confirmButtonText: 'OK',
                timer: 2000,
            });
        </script>
    @endif

    <script>
        AOS.init({
            once: true // Animasi hanya akan diputar sekali
        });
        window.addEventListener('DOMContentLoaded', () => {
            const portfolioItems = document.querySelectorAll('.portfolio-item');
            portfolioItems.forEach((item, index) => {
                item.style.transitionDelay = `${index * 300}ms`;
                item.style.opacity = 1;
            });
        });
    </script>

    @stack('body')
</body>

</html>
