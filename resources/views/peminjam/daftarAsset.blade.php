@extends('layouts.peminjam')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Pengajuan Ruangan & Alat</h2>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">PERATURAN DALAM PEMINJAMAN!</h6>
            </div>
            <div class="card-body">
                <p>1. Peminjaman diajukan seminggu sebelum acara, dan setelah itu, tim peminjaman akan memproses permohonan,
                    meninjau ketersediaan fasilitas, dan mengonfirmasi status peminjaman kepada pihak yang mengajukan.</p>
                <p>2. Ruangan dan Alat hanya dapat dipinjam 1x dalam seminggu, untuk Alat hanya dapat meminjam
                    1 jenis, sebanyak 3 jumlah barang.</p>
                <p>3. Peminjaman akan di setujui jika ruangan dan alat praktikum digunakan untuk kegiatan
                    kampus atau kegiatan dalam belajar.</p>
                <p>4. Setelah peminjaman di setujui , maka saat waktu peminjaman telah habis pengusul wajib mengembalikan
                    alat praktikum dan meninggalkan ruangan sesuai dengan waktu yang telah di tentukan</p>
                <p>5. Jika terjadi kerusakan maka akan di kenakan sanksi, dimana sanksi yang akan diberikan oleh penanggung
                    jawab</p>
            </div>
        </div>
        <div class="filter">
            <label for="alat">Filter</label>
            <select id="alat" onchange="filter()">
                <option value="semua">Semua</option>
                <option value="alat1">Ruangan</option>
                <option value="alat2">Alat</option>
            </select>
        </div>
        <div class="card-body">
            <table id="table1" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nama Ruangan/Alat</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center"></td>
                        <td>
                            <a data-toggle="modal" data-target="#ruanganModal">
                                <img src="img/ruangan.jpg" width="100" style="float: left; margin-right: 10px;">
                                TA 11.5
                            </a>
                        </td>
                        <td>1</td>
                        <td class="h5 mb-0 font-weight-bold">
                            <span style="color: rgb(0, 255, 42);">
                                Tersedia
                            </span>
                        </td>
                        <td>
                            <div class="modal-footer, button-center">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#formPengajuanModal">
                                    Pinjam
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>


                <!-- Modal -->
                <div class="modal fade" id="ruanganModal" tabindex="-1" role="dialog" aria-labelledby="ruanganModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ruanganModalLabel">Informasi Ruangan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="ruanganCarousel" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#ruanganCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#ruanganCarousel" data-slide-to="1"></li>
                                        <li data-target="#ruanganCarousel" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="img/ruangan1.jpg" class="d-block w-100" alt="Ruangan 1">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="img/ruangan2.jpg" class="d-block w-100" alt="Ruangan 2">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="img/ruangan3.jpg" class="d-block w-100" alt="Ruangan 3">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#ruanganCarousel" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Sebelumnya</span>
                                    </a>
                                    <a class="carousel-control-next" href="#ruanganCarousel" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Selanjutnya</span>
                                    </a>
                                </div>
                                <p>Nama Ruangan: TA 11.5</p>
                                <p>Lokasi: Gedung TA</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>

                    <tbody>
                        <tr>
                            <td class="text-center"></td>
                            <td>
                                <a data-toggle="modal" data-target="#alatModal">
                                    <img src="img/pro1.png" width="100" style="float: left; margin-right: 10px;">
                                    HEADSET
                                </a>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="quantity"></label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default, btn-center"
                                                onclick="decrement()" style="width: 30px;">-</button>
                                        </span>
                                        <input type="text" id="quantity" class="form-control, btn-center"
                                            value="0" style="width: 30px;">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default, btn-center"
                                                onclick="increment()" style="width: 30px;">+</button>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="h5 mb-0 font-weight-bold">
                                <span style="color: rgb(0, 255, 42);">
                                    Tersedia
                                </span>
                            </td>
                            <td>
                                <div class="modal-footer, button-center">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#formPengajuanModal">
                                        Pinjam
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>

                    <!-- Modal -->
                    <div class="modal fade" id="alatModal" tabindex="-1" role="dialog"
                        aria-labelledby="alatModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="alatModalLabel">Informasi Alat</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="img/pro1.png" class="d-block mx-auto mb-3" style="max-width: 200px;"
                                        alt="Headset">
                                    <p>Nama Alat: HEADSET</p>
                                    <p>Jumlah: <span id="jumlahAlat">20</span></p>
                                    <p>Status: <span style="color: rgb(0, 255, 42);">Tersedia</span></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal untuk form pengajuan peminjaman alat 1 -->
                    <div class="modal fade" id="formPengajuanModal" tabindex="-1"
                        aria-labelledby="formPengajuanModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="formPengajuanModalLabel">Pengajuan Peminjaman Ruangan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="namaPengusul" class="form-label">Nama Pengusul</label>
                                            <input type="text" class="form-control" id="namaPengusul">
                                        </div>
                                        <div class="mb-3">
                                            <label for="namaRuangan" class="form-label">Nama Ruangan</label>
                                            <select class="form-select" id="namaRuangan">
                                                <option value="" selected>Pilih Nama Ruangan</option>
                                                <option value="R1">Ruangan 1</option>
                                                <option value="R2">Ruangan 2</option>
                                                <option value="R3">Ruangan 3</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3">
                                                <label for="datetimeMulai" class="form-label">Tanggal dan Waktu
                                                    Mulai</label>
                                                <input type="datetime-local" class="form-control" id="datetimeMulai"
                                                    name="datetimeMulai" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="datetimeBerakhir" class="form-label">Tanggal dan Waktu
                                                    Berakhir</label>
                                                <input type="datetime-local" class="form-control" id="datetimeBerakhir"
                                                    name="datetimeBerakhir" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <textarea class="form-control" id="keterangan" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="penanggungJawab" class="form-label">Penanggung Jawab</label>
                                            <select class="form-select" id="penanggungJawab">
                                                <option value="" selected>Pilih Penanggung Jawab</option>
                                                <option value="PJ1">Penanggung Jawab 1</option>
                                                <option value="PJ2">Penanggung Jawab 2</option>
                                                <option value="PJ3">Penanggung Jawab 3</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-primary">Kirim</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        function increment() {
                            var quantityInput = document.getElementById('quantity');
                            var currentValue = parseInt(quantityInput.value);
                            quantityInput.value = currentValue + 1;
                        }

                        function decrement() {
                            var quantityInput = document.getElementById('quantity');
                            var currentValue = parseInt(quantityInput.value);
                            if (currentValue > 0) {
                                quantityInput.value = currentValue - 1;
                            }
                        }
                    </script>
                @endsection
