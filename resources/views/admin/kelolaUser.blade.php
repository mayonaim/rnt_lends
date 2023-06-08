@extends('layouts.admin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Manajemen User</h2>
        </div>
        <div class="card-body">
            <p class="mb-4">Table Data Manajemen User</p>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahModal">Tambah Data</button>
            <table id="table1" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>PICLAB001</td>
                        <td>PIC Lab 1</td>
                        <td>PIC Lab</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm text-white"> Edit </button>

                            <button type="button" class="btn btn-danger btn-sm text-white"> Hapus </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>PICLAB002</td>
                        <td>PIC Lab 2</td>
                        <td>PIC Lab</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm text-white"> Edit </button>

                            <button type="button" class="btn btn-danger btn-sm text-white"> Hapus </button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>PICLAB003</td>
                        <td>PIC Lab 3</td>
                        <td>PIC Lab</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm text-white"> Edit </button>

                            <button type="button" class="btn btn-danger btn-sm text-white"> Hapus </button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>PICLAB004</td>
                        <td>PIC Lab 4</td>
                        <td>PIC Lab</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm text-white"> Edit </button>

                            <button type="button" class="btn btn-danger btn-sm text-white"> Hapus </button>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>EmaKepalaBesar</td>
                        <td>Ema Safitri</td>
                        <td>PIC Lab</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm text-white"> Edit </button>

                            <button type="button" class="btn btn-danger btn-sm text-white"> Hapus </button>
                        </td>
                    </tr>

                </tbody>
                <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahModalLabel">Tambah Data User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form untuk menambah data user -->
                                <form>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username"
                                            placeholder="Masukkan username">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama"
                                            placeholder="Masukkan nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="level">Level</label>
                                        <select class="form-control" id="level">
                                            <option>PIC Lab</option>
                                            <option>Admin</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
