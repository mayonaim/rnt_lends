@extends('layouts.penanggungJawab')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">History</h2>
        </div>
        <div class="card-body">
            <p class="mb-4">History mahasiswa melakukan peminjaman.</p>
            <table id="table1" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Peminjam</th>
                        <th>Peminjaman</th>
                        <th>Tangggal Jam Peminjaman</th>
                        <th>Aksi</th>
                        <th>Keterangan </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Ramah Arief-4342201030</td>
                        <td>Ruangan 1</td>
                        <td>2023/03/19 12:00PM - 02:00PM</td>
                        <td><a href="" class="btn btn-primary btn-sm text-white"> Teruskan </a>
                            <a href="" class="btn btn-danger btn-sm text-white"> Tolak </a>
                        </td>
                        <td>Pengajuan diteruskan</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Mahasiswa 2</td>
                        <td>Ruangan 2</td>
                        <td>2023/03/20 12:00</td>
                        <td><a href="" class="btn btn-primary btn-sm text-white"> Teruskan </a>
                            <a href="" class="btn btn-danger btn-sm text-white"> Tolak </a>
                        </td>
                        <td>Pengajuan diteruskan</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Mahasiswa 3</td>
                        <td>Ruangan 3</td>
                        <td>2023/03/21 12:00</td>
                        <td><a href="" class="btn btn-primary btn-sm text-white"> Teruskan </a>
                            <a href="" class="btn btn-danger btn-sm text-white"> Tolak </a>
                        </td>
                        <td>Pengajuan diteruskan</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Mahasiswa 4</td>
                        <td>Ruangan 4</td>
                        <td>2023/03/22 12:00</td>
                        <td><a href="" class="btn btn-primary btn-sm text-white"> Teruskan </a>
                            <a href="" class="btn btn-danger btn-sm text-white"> Tolak </a>
                        </td>
                        <td>Pengajuan diteruskan</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Mahasiswa 5</td>
                        <td>Alat 1</td>
                        <td>2023/03/19 12:00</td>
                        <td><a href="" class="btn btn-primary btn-sm text-white"> Teruskan </a>
                            <a href="" class="btn btn-danger btn-sm text-white"> Tolak </a>
                        </td>
                        <td>Pengajuan diteruskan</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Mahasiswa 6</td>
                        <td>Alat 2</td>
                        <td>2023/03/19 12:00</td>
                        <td><a href="" class="btn btn-primary btn-sm text-white"> Teruskan </a>
                            <a href="" class="btn btn-danger btn-sm text-white"> Tolak </a>
                        </td>
                        <td>Pengajuan diteruskan</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
