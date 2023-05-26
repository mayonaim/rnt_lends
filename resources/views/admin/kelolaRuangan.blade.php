@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Kelola Ruangan</h2>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahModal">Tambah
                Ruangan</button>
            <table id="table1" class="table table-striped" style="width:100%">
                <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahModalLabel">Tambah Data Ruangan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="namaRuangan">Nama Ruangan</label>
                                        <input type="text" class="form-control" id="namaRuangan"
                                            placeholder="Nama Ruangan">
                                    </div>
                                    <div class="form-group">
                                        <label for="pemilikRuangan">Pemilik Ruangan</label>
                                        <input type="text" class="form-control" id="pemilikRuangan"
                                            placeholder="Pemilik Ruangan">
                                    </div>
                                    <div class="form-group">
                                        <label for="gambarRuangan">Gambar Ruangan</label>
                                        <input type="file" class="form-control-file" id="gambarRuangan"
                                            accept=".jpg, .png, .jpeg">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary" onclick="simpanDataRuangan()">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th>Nama Ruangan</th>
                        <th>Nama Pemilik</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ruangan 1</td>
                        <td>sidabutar</td>

                        <td>
                            <button type="button" class="btn btn-warning btn-sm text-white">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm text-white">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Ruangan 2</td>
                        <td>Gatau</td>

                        <td>
                            <button type="button" class="btn btn-warning btn-sm text-white">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm text-white">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Ruangan 3</td>
                        <td>siapa</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm text-white">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm text-white">Hapus</button>
                        </td>
                    </tr>

                </tbody>
                <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">

                                <h5 class="modal-title" id="tambahModalLabel">Tambah Ruangan</h5>
                            </div>
                            <div class="modal-body">
                                <form id="formTambahRuangan">
                                    <div class="form-group">
                                        <label for="namaRuangan">Nama Ruangan</label>
                                        <input type="text" class="form-control" id="namaRuangan" required>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary" onclick="tambahRuangan()">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </table>
        </div>
    </div>
@endsection
