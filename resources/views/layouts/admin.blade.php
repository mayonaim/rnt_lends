<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.components.head')
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!--Sidebar-->
        @include('layouts.components.sidebar.admin')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.components.topbar')

                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    </div>
    <!-- End of Page Wrapper -->


    @include('layouts.components.body')

</body>

</html>
