@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Kelola Ruangan</h2>
        </div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahModal">Tambah</button>
        <div class="card-body">
            <table id="table1" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>PIC</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assets as $asset)
                        <tr>
                            <td>{{ $asset->name }}</td>
                            <td>{{ $asset->description }}</td>
                            <td>{{ $asset->category }}</td>
                            <td>{{ $asset->stock }}</td>
                            <td>{{ $asset->pic->name }}</td>
                            <td>
                                <a type="button" class="btn btn-warning btn-sm text-white"
                                    href="{{ route('') }}">Edit</a>
                                <a type="button" class="btn btn-danger btn-sm text-white"
                                    href="{{ route('') }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
                                <label for="jenis">Jenis Asset</label>
                                <select name="category" id="jenis" class="form-control" required>
                                    <option value="room">Ruangan</option>
                                    <option value="tool">Alat</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="namaAsset">Nama Asset</label>
                                <input type="text" name="name" class="form-control" id="namaAsset"
                                    placeholder="Nama Asset">
                            </div>
                            <div class="form-group">
                                <label for="pic">Nama PIC</label>
                                <input type="text" name="pic_id" class="form-control" id="pic"
                                    placeholder="Nama PIC">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="description" class="form-control" id="deskripsi" placeholder="Deskripsi"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number" name="stock" class="form-control" id="stock" placeholder="Stock"
                                    min="0">
                            </div>
                            {{-- Add more inputs here --}}
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" onclick="simpanDataRuangan()">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
