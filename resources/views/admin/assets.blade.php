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
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#CreateAssetModal">Tambah</button>
        <div class="card-body">
            <table id="myTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Asset</th>
                        <th>Description</th>
                        <th>PIC</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    @include('admin.create-asset')
@endsection
@push('body')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/r-2.4.1/sc-2.1.1/datatables.min.js">
    </script>
    <script>
        $(document).ready(function() {
            var retrievedData;

            function selectElement() {
                var selectOptions = '';

                $.each(retrievedData.pics, function(index, pic) {
                    selectOptions += '<option value="' + pic.id + '">' + pic.name + '</option>';
                });

                $('#pic').html(selectOptions);
            }
        }; $('#myTable').DataTable({
            ajax: {
                url: '/admin/data/assets',
                type: 'GET',
                dataType: 'json',
                dataSrc: 'assets',
                success: function(data) {
                    retrievedData = data;
                    selectElement();
                }
            },
            columns: [{
                    data: null,
                    render: function(_, _, _, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data: 'name'
                },
                {
                    data: 'description'
                },
                {
                    data: 'pic.name'
                },
                {
                    data: 'category',
                    render: function(data, type, row) {
                        // Generate the dropdown select based on the category
                        var select = '<select>';
                        row.categories.forEach(function(category) {
                            select += '<option value="' + category + '">' + category +
                                '</option>';
                        });
                        select += '</select>';

                        return select;
                    }
                },
                {
                    data: 'stock'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CreateBorrowRequestModal' +
                            row.id + '">Borrow</button>';
                    },
                }
            ],
        });
        });
    </script>
    @php
    dd($variable);
@endphp
    <script>
        function confirmDelete(event) {
            event.preventDefault();

            if (confirm("Are you sure you want to delete this asset?")) {
                document.getElementById('deleteForm').submit();
            }
        }
    </script>
@endpush
{{-- <td>
    <a type="button" class="btn btn-warning btn-sm text-white" data-toggle="modal"
        data-target="#editAssetModal{{ $asset->id }}">Edit</a>
    <form action="{{ route('asset.destroy', $asset->id) }}" method="POST" id="deleteForm">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm text-white" onclick="confirmDelete(event)">Delete</button>
    </form>
</td> --}}
