@extends('layouts.main')
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
                <!-- Judul tabel -->
                <thead>
                    <tr>
                        <th>Nama Alat</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Alat 1 -->
                    <tr>
                        <td>
                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">
                                <img src="/images/pro1.jpg" alt="Gambar Alat 1" width="100"></button><h6>Alat 1</h6>
                        </td>
                        <td>10</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm text-white">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm text-white">Hapus</button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">Informasi Alat</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        <div id="carouselExample" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="/images/pro1.jpg" class="d-block w-100"
                                                        alt="Bentuk 1">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="/images/pro2.jpg" class="d-block w-100"
                                                        alt="Bentuk 2">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="/images/pro3.jpg" class="d-block w-100"
                                                        alt="Bentuk 3">
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
                                                <hr class="garis-dengan-jarak">
                                                <style>
                                                    .garis-dengan-jarak {
                                                    margin-top: 20px;
                                                    margin-bottom: 20px;
                                                    }
                                                </style>
                                                <b>Informasi tentang Alat 1.</b>
                                                <p>Anda dapat menambahkan Informasi Alat yang lebih detail di sini.</p>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Alat 2 -->
                    <tr>
                        <td>
                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#meModal">
                                <img src="/images/pro3.jpg" alt="Gambar Alat 2" width="100"></button><h6>Alat 2</h6>
                        </td>
                        <td>10</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm text-white"> Edit</button>
                            <button type="button" class="btn btn-danger btn-sm text-white"> Hapus</button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="meModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">Informasi Alat</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        <div id="carouselExample" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="/images/pro2.jpg" class="d-block w-100" alt="Bentuk 1">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="/images/pro1.jpg" class="d-block w-100" alt="Bentuk 2">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="/images/pro3.jpg" class="d-block w-100" alt="Bentuk 3">
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
                                                <hr class="garis-dengan-jarak">
                                                <style>
                                                    .garis-dengan-jarak {
                                                    margin-top: 20px;
                                                    margin-bottom: 20px;
                                                    }
                                                </style>
                                                <b>Informasi tentang Alat 2.</b>
                                                <p>Anda dapat menambahkan Informasi Alat yang lebih detail di sini.</p>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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

                <!-- Button Tambah Alat -->
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
