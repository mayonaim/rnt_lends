@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
                                <a type="button" class="btn btn-warning btn-sm text-white" data-toggle="modal"
                                    data-target="#editModal{{ $asset->id }}">Edit</a>
                                <a type="button" class="btn btn-danger btn-sm text-white" href="#">Delete</a>
                            </td>
                        </tr>
                        {{-- Edit Modal --}}
                        <div class="modal fade" id="editModal{{ $asset->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="editModalLab aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Data Asset</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('editAsset', $asset->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ $asset->name }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description" required>{{ $asset->description }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <input type="text" class="form-control" id="category" name="category"
                                                    value="{{ $asset->category }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="stock">Stock</label>
                                                <input type="number" class="form-control" id="stock" name="stock"
                                                    value="{{ $asset->stock }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="pic_id">PIC</label>
                                                <select class="form-control" id="pic_id" name="pic_id" required>
                                                    @foreach ($pics as $pic)
                                                        <option value="{{ $pic->id }}"
                                                            @if ($pic->id === $asset->pic_id) selected @endif>
                                                            {{ $pic->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="images">Images</label>
                                                <input type="file" class="form-control-file" id="images"
                                                    name="images[]" multiple accept="image/*">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="button" class="btn btn-primary"
                                            onclick="simpanDataRuangan()">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog"
                        aria-labelledby="tambahModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahModalLabel">Tambah Data Asset</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('tambahAsset') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <!-- Asset details -->
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
                                            <select name="pic_id" id="pic" class="form-control" required>
                                                <option value="">pic</option>
                                                @foreach ($pics as $pic)
                                                    <option value="{{ $pic->id }}">{{ $pic->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea name="description" class="form-control" id="deskripsi" placeholder="Deskripsi"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input type="number" name="stock" class="form-control" id="stock"
                                                placeholder="Stock" min="0">
                                        </div>

                                        <!-- Image upload -->
                                        <div class="form-group">
                                            <label for="images">Images</label>
                                            <input type="file" name="images[]" id="images"
                                                class="form-control-file" multiple accept="image/jpeg,image/png" required>
                                        </div>

                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
@endsection
