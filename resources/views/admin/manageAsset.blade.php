@extends('main.main_administrator')
@section('mainadmin')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">Kelola Ruangan</h2>
    </div>
    <div class="card-body">
        <p class="mb-4">Data Ruangan</p>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahModal">Tambah Ruangan</button>
        <table id="table1" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Nama Ruangan</th>
                    
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ruangan 1</td>
                  
                    <td>
                        <button type="button" class="btn btn-warning btn-sm text-white">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm text-white">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>Ruangan 2</td>
                    
                    <td>
                        <button type="button" class="btn btn-warning btn-sm text-white">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm text-white">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>Ruangan 3</td>
                    
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