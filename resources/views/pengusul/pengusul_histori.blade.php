@extends('main.main_pengusul')
@section('mainpengusul')

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
                    <th>Nama</th>
                    <th>Peminjaman</th>
                    <th>Tanggal</th>
                    
                    <th>Status Pengajuan</th>
                    <th>Rekomendasi Penanggung Jawab</th>
                    <th>Rekomendasi Administrator</th>
                    <th>Keterangan </th>
                </tr>
                    
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Nabil</td>
                    <td>Ruangan 1</td>
                    <td>20-03-2023</td>
                    
                    <td>Pengajuan Anda <strong>Disetujui</strong> oleh Adminstrator</td>
                    <td>Pengajuan Anda <strong>Direkomendasikan</strong> oleh penanggung jawab</td>
                    <td>Pengajuan Anda <strong>Direkomendasikan</strong> oleh Administraor</td>
                    <td>Pengajuan peminjaman ruangan sudah di proses, anda sudah bisa memakai ruangan</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nabil</td>
                    <td>Ruangan 2</td>
                    <td>25-03-2023</td>
                    
                    <td><strong>Maaf. Pengajuan Anda tidak disetujui</strong></td>
                    <td>Pengajuan Anda <strong>Direkomendasikan</strong> oleh penanggung jawab</td>
                    <td>Pengajuan Anda <strong>Tidak direkomendasikan</strong> oleh Administraor</td>
                    <td>Disarankan mengajukan ulang kembali</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nabil</td>
                    <td>Ruangan 5</td>
                    <td>25-03-2023</td>
                    >
                    <td><strong>Maaf. Pengajuan Anda tidak disetujui</strong></td>
                    <td>Pengajuan Anda<strong> Tidak direkomendasikan</strong> oleh penanggung jawab</td>
                    <td></td>
                    <td>Disarankan mengajukan ulang kembali</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- /.container-fluid -->


@endsection