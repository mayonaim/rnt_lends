@extends('layouts.main')
@push('head')
    <link
        href="https://cdn.datatables.net/v/bs5/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/r-2.4.1/sc-2.1.1/datatables.min.css"
        rel="stylesheet" />
@endpush
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="scroll-horizontal">
            <!-- Page Heading -->
            <div class="d-sm-relative align-items-center justify-content-between lg-4">
                <h2 class="h3 mb-0 text-gray-800">Riwayat Peminjaman</h2>
                <div class="card-body">
                    <table id="myTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Asset</th>
                                <th>Supervisor</th>
                                <th>Activity</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( as )

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
    @push('body')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script
            src="https://cdn.datatables.net/v/bs5/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/r-2.4.1/sc-2.1.1/datatables.min.js">
        </script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable({
                    ajax: {
                        url: '/borrowing-request/index',
                        type: 'GET',
                        dataType: 'json',
                        dataSrc: 'borrowRequests',
                        success: function(data) {
                            retrievedData = data;
                            processRetrievedData();
                        }
                    },
                    columns: [{
                            data: null,
                            render: function(_, _, _, meta) {
                                return meta.row + 1;
                            }
                        },
                        {
                            data: 'asset.name'
                        },
                        {
                            data: 'supervisor.name'
                        },
                        {
                            data: 'activity'
                        },
                        {
                            data: 'borrowed_amount'
                        },
                        {
                            data: 'status',
                            render: function(data, type, row, meta) {
                                return '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CreateBorrowRequestModal' +
                                    row.id + '">Borrow</button>';
                            },
                        }
                    ],
                });
            });
        </script>
    @endpush
