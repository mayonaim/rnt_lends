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
            <table id="myTable" class="table table-striped" style="width:100%">
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
                                    data-target="#ediAssetModal{{ $asset->id }}">Edit</a>
                                <form action="{{ route('hapusAsset', $asset->id) }}" method="POST" id="deleteForm">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm text-white"
                                        onclick="confirmDelete(event)">Delete</button>
                                </form>
                                @push('scripts')
                                    <script>
                                        function confirmDelete(event) {
                                            event.preventDefault();

                                            if (confirm("Are you sure you want to delete this asset?")) {
                                                document.getElementById('deleteForm').submit();
                                            }
                                        }
                                    </script>
                                @endpush
                            </td>
                        </tr>
                        @include('layouts.components.modalForm.editAsset')
                </tbody>
                @endforeach
                </tbody>
            </table>
        </div>
        @include('layouts.components.modalForm.tambahAsset')
    </div>
@endsection
