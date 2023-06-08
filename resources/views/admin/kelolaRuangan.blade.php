@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Ruang Kelola</h2>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahModal">Tambahkan</button>
            <table id="table1" class="table table-striped" style="width:100%">
                <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahModalLabel">Tambah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="namaRuangan">Nama</label>
                                        <input type="text" class="form-control" id="namaRuangan"
                                            placeholder="Nama Ruangan/Alat">
                                    </div>
                                    <div class="form-group">
                                        <label for="pemilikRuangan">Pemilik</label>
                                        <input type="text" class="form-control" id="pemilikRuangan"
                                            placeholder="Nama Pemilik">
                                    </div>
                                    <div class="form-group">
                                        <label for="gambarRuangan">Gambar</label>
                                        <input type="file" class="form-control-file" id="gambarRuangan"
                                            accept=".jpg, .png, .jpeg">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenisRuangan">Jenis</label><br>
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn">
                                                <input type="radio" name="jenis" value="Ruangan" checked>Ruangan
                                            </label>
                                            <label class="btn">
                                                <input type="radio" name="jenis" value="Alat">Alat
                                            </label>
                                        </div>
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
                        <th>Nama Ruangan/Alat</th>
                        <th>Nama Pemilik</th>
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
                        <td>sidabutar</td>
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
                                            <span class="sr-only">Lanjut</span>
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
                        <td>
                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal2">
                                <img src="lokasi_gambar_ruangan2_1" alt="Gambar Ruangan 2" width="100">
                                Ruangan 2
                            </button>
                        </td>
                        <td>Gatau</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm text-white">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm text-white">Hapus</button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="modalLabel2"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel2">Informasi Ruangan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div id="carouselExample2" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="lokasi_gambar_ruangan2_1" class="d-block w-100"
                                                    alt="Gambar Ruangan 1">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="lokasi_gambar_ruangan2_2" class="d-block w-100"
                                                    alt="Gambar Ruangan 2">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="lokasi_gambar_ruangan2_3" class="d-block w-100"
                                                    alt="Gambar Ruangan 3">
                                            </div>
                                            <!-- Tambahkan carousel-item sesuai dengan jumlah gambar ruangan yang ingin ditampilkan -->
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExample1" role="button"
                                            data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExample2" role="button"
                                            data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Lanjut</span>
                                        </a>

                                    </div>
                                    <p>Informasi tentang Ruangan 2.</p>
                                    <p>Anda dapat menambahkan informasi ruangan yang lebih detail di sini.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </tbody>
                <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog"
                    aria-labelledby="tambahModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">

                                <h5 class="modal-title" id="tambahModalLabel">Tambah</h5>
                            </div>
                            <div class="modal-body">
                                <form id="formTambahRuangan">
                                    <div class="form-group">
                                        <label for="namaRuangan">Nama</label>
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
