<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>R&T Lends</title>

    <!-- Custom fonts for this template-->
    @include('partials.css')
</head>
<body id="page-top">
      <!-- Page Wrapper -->
      <div id="wrapper">

        <!--Sidebar-->
        @include('partials.sidebar_admin')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('partials.topbar')

                 <!-- Begin Page Content -->
                 @yield('mainadmin')
                 <!-- /.container-fluid -->
             </div>
             <!-- End of Main Content -->
         </div>
         <!-- End of Content Wrapper -->
     </div>
     <!-- End of Page Wrapper -->

     <!-- Scroll to Top Button-->
     <a class="scroll-to-top rounded" href="#page-top">
         <i class="fas fa-angle-up"></i>
     </a>

     <!-- Logout Modal-->
     @include('partials.modalbawah')

     <!-- Bootstrap core JavaScript-->
     @include('partials.js')

 </body>

</html>
