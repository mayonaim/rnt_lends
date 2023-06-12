@extends('layouts.peminjam')
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
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h2 class="h3 mb-0 text-gray-800">Pengajuan Ruangan & Alat</h2>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">PERATURAN DALAM PEMINJAMAN!</h6>
                </div>
                <div class="card-body">
                    <p>1. Peminjaman diajukan seminggu sebelum acara, dan setelah itu, tim peminjaman akan memproses
                        permohonan,
                        meninjau ketersediaan fasilitas, dan mengonfirmasi status peminjaman kepada pihak yang mengajukan.
                    </p>
                    <p>2. Ruangan dan Alat hanya dapat dipinjam 1x dalam seminggu, untuk Alat hanya dapat meminjam
                        1 jenis, sebanyak 3 jumlah barang.</p>
                    <p>3. Peminjaman akan di setujui jika ruangan dan alat praktikum digunakan untuk kegiatan
                        kampus atau kegiatan dalam belajar.</p>
                    <p>4. Setelah peminjaman di setujui , maka saat waktu peminjaman telah habis pengusul wajib
                        mengembalikan
                        alat praktikum dan meninggalkan ruangan sesuai dengan waktu yang telah di tentukan</p>
                    <p>5. Jika terjadi kerusakan maka akan di kenakan sanksi, dimana sanksi yang akan diberikan oleh
                        penanggung
                        jawab</p>
                </div>
            </div>
            <div class="card-body">
                <table id="myTable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Asset</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
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
                    url: '/asset/index',
                    type: 'GET',
                    dataType: 'json',
                    dataSrc: 'assets',
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
                        data: 'name'
                    },
                    {
                        data: 'description'
                    },
                    {
                        data: 'category',
                        render: function(data, type, row) {
                            // Generate the dropdown select based on the category
                            var select = '<select>';
                            row.categories.forEach(function(category) {
                                select += '<option value="' + category + '">' + category +
                                    '</option>';
                            });
                            select += '</select>';

                            return select;
                        }
                    },
                    {
                        data: 'stock'
                    },
                    {
                        data: null,
                        render: function(data, type, row, ) {
                            return '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CreateBorrowRequestModal' +
                                row.id + '">Borrow</button>';
                        },
                    }
                ],
            });
        });
    </script>
@endpush
