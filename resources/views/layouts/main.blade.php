@extends('layouts.app')
@section('content-wrapper')

@include('layouts.components.sidebar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @include('layouts.components.topbar')
            <!-- Begin Page Content -->
            @yield('content')
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
@endsection
