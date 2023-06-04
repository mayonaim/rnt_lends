@extends('layouts.picLab')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Ruang Kelola</h2>
        </div>
        <div class="card-body">
            <p class="mb-4">Data Alat</p>
            <table id="table1" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Alat</th>
                        <th>Stok</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">
                                <img src="lokasi_gambar_ruangan1" alt="Gambar Ruangan 1" width="100">
                                Ruangan 1
                            </button>
                        </td>
                        <td>10</td>
                        <td class="h5 mb-0 font-weight-bold" style="color: rgb(0, 255, 42);">Tersedia
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm text-white">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm text-white">Hapus</button>
                        </td>

                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">Informasi Ruangan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div id="carouselExample" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="lokasi_gambar_ruangan1" class="d-block w-100"
                                                    alt="Gambar Ruangan 1">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="lokasi_gambar_ruangan2" class="d-block w-100"
                                                    alt="Gambar Ruangan 2">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="lokasi_gambar_ruangan3" class="d-block w-100"
                                                    alt="Gambar Ruangan 3">
                                            </div>
                                            <!-- Tambahkan carousel-item sesuai dengan jumlah gambar ruangan yang ingin ditampilkan -->
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExample" role="button"
                                            data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExample" role="button"
                                            data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                    <p>Informasi tentang Ruangan 1.</p>
                                    <p>Anda dapat menambahkan informasi ruangan yang lebih detail di sini.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <tr>
                        <td>Alat 2</td>
                        <td>10</td>
                        <td class="h5 mb-0 font-weight-bold" style="color: rgb(255, 38, 0);">Tidak Tersedia
                        </td>
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
                        <td class="h5 mb-0 font-weight-bold" style="color: rgb(255, 38, 0);">Tidak Tersedia
                        </td>
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
                        <td class="h5 mb-0 font-weight-bold" style="color: rgb(0, 255, 42);">Tersedia
                        </td>
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
                        <td class="h5 mb-0 font-weight-bold" style="color: rgb(0, 255, 42);">Tersedia
                        </td>
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
                        <td class="h5 mb-0 font-weight-bold" style="color: rgb(0, 255, 42);">Tersedia
                        </td>
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
                        <td class="h5 mb-0 font-weight-bold" style="color: rgb(255, 38, 0);">Tidak Tersedia
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm text-white"> Edit

                            </button>

                            <button type="button" class="btn btn-danger btn-sm text-white"> Hapus

                            </button>
                        </td>
                    </tr>
                </tbody>
                <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog"
                    aria-labelledby="tambahModalLabel">
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
