@extends('layouts.picLab')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Kelola Alat</h2>
        </div>
        <div class="card-body">
            <p class="mb-4">Data Alat</p>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahModal">Tambah Alat</button>
            <table id="table1" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Alat</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Alat 1</td>
                        <td>10</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm text-white"> Edit </button>

                            <button type="button" class="btn btn-danger btn-sm text-white"> Hapus </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Alat 2</td>
                        <td>10</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm text-white"> Edit
                            </button>
                            <button type="button" class="btn btn-danger btn-sm text-white"> Hapus
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Alat 3</td>
                        <td>10</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm text-white"> Edit
                            </button>
                            <button type="button" class="btn btn-danger btn-sm text-white"> Hapus
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Alat 4</td>
                        <td>10</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm text-white"> Edit

                            </button>

                            <button type="button" class="btn btn-danger btn-sm text-white"> Hapus

                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Alat 5</td>
                        <td>10</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm text-white"> Edit

                            </button>

                            <button type="button" class="btn btn-danger btn-sm text-white"> Hapus

                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Alat 6</td>
                        <td>10</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm text-white"> Edit

                            </button>

                            <button type="button" class="btn btn-danger btn-sm text-white"> Hapus

                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Alat 7</td>
                        <td>10</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm text-white"> Edit

                            </button>

                            <button type="button" class="btn btn-danger btn-sm text-white"> Hapus

                            </button>
                        </td>
                    </tr>
                </tbody>
                <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">

                                <h5 class="modal-title" id="tambahModalLabel">Tambah Alat</h5>
                            </div>
                            <div class="modal-body">
                                <form id="formTambahAlat">
                                    <div class="form-group">
                                        <label for="namaAlat">Nama Alat</label>
                                        <input type="text" class="form-control" id="namaAlat" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah">Stok</label>
                                        <input type="number" class="form-control" id="jumlah" required>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary" onclick="tambahAlat()">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
