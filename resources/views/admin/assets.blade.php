@extends('layouts.main')
@push('head')
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endpush
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
        <div class="row">
            <div class="col-md-12">
                <table id="myTable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Asset</th>
                            <th>Deskripsi</th>
                            <th>PIC</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assets as $asset)
                            <tr>
                                <td></td>
                                <td>{{ $asset->name }}</td>
                                <td>{{ $asset->description }}</td>
                                <td>{{ $asset->pic->name }}</td>
                                <td>{{ $asset->category }}</td>
                                <td>{{ $asset->stock }}</td>
                                <td>
                                    <a type="button" class="btn btn-warning btn-sm text-white" data-toggle="modal"
                                        data-target="#EditAssetModal{{ $asset->id }}">Edit</a>
                                    <form action="{{ route('asset.destroy') }}" method="POST" id="deleteForm">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $asset->id }}">
                                        <button type="submit" class="btn btn-danger btn-sm text-white"
                                            onclick="confirmDelete(event)">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            {{-- Modal Edit Asset --}}
                            @include('admin.edit-asset')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Modal Tambah Asset --}}
        @include('admin.create-asset')
    </div>
@endsection
@push('body')
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/r-2.4.1/sc-2.1.1/datatables.min.js">
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable({
                dom: `
                        <'row'<'col-md-3'l><'col-md-3'B><'col-md-2 selectHtml'><'col-md-4'f>>
                        <'row'<'col-md-12'tr>>
                        <'row'<'col-md-3'i><'col-md-5 button-container'><'col-md-4'p>>
                    `,
                columnDefs: [{
                        targets: 0,
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        },
                        orderable: false,
                        searchable: false
                    },
                    {
                        targets: 4,
                        render: function(data, type, row, meta) {
                            if (type === 'display') {}
                            return data;
                        }
                    }
                ],
                buttons: [{
                    extend: 'pdf',
                    customize: function(doc) {
                        var now = new Date();
                        var formattedDate = now.getDate() + '/' + (now.getMonth() + 1) + '/' +
                            now.getFullYear();
                        doc.content.splice(0, 0, {
                            text: 'Created on: ' + formattedDate,
                            alignment: 'right',
                            margin: [0, 0, 20, 0]
                        });
                    }
                }],
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All']
                ]
            });

            var selectHtml = '<select>';
            selectHtml += '<option value="">All</option>';
            selectHtml += '<option value="room">Rooms</option>';
            selectHtml += '<option value="tool">Tools</option>';
            selectHtml += '</select>';

            $('.selectHtml').html(selectHtml);

            $('.selectHtml').on('change', 'select', function() {
                var category = $(this).val();
                table.column(4).search(category).draw();
            });

            $('.button-container').html(
                '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#CreateAssetModal">Tambah <i class="fa-regular fa-plus"></i></button>'
            );
        });
    </script>
@endpush
