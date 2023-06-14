@extends('layouts.main')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">History</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="myTable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Asset</th>
                            <th>Supervisor</th>
                            <th>Activity</th>
                            <th>Amount</th>
                            <th>Schedule</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($borrowRequests as $borrowing)
                            @php
                                $startTimestamp = \Carbon\Carbon::parse($borrowing->start_timestamp)->format('Y-m-d H:i:s');
                                $endTimestamp = \Carbon\Carbon::parse($borrowing->end_timestamp)->format('Y-m-d H:i:s');
                            @endphp
                            <tr>
                                <td></td>
                                <td>{{ $borrowing->asset->name }}</td>
                                <td>{{ $borrowing->supervisor->name }}</td>
                                <td>{{ $borrowing->activity }}</td>
                                <td>{{ $startTimestamp . ' - ' . $endTimestamp }}</td>
                                <td>{{ $borrowing->borrowed_amount }}</td>
                                <td>{{ $borrowing->status }}</td>
                                <td>
                                    @if ($borrowing->status === 'pending')
                                        <a type="button" class="btn btn-warning btn-sm text-white" data-toggle="modal"
                                            data-target="#editAssetModal{{ $borrowing->id }}">Edit</a>
                                    @endif
                                    @if ($borrowing->status === 'borrowing')
                                    <form action="{{ route('borrow_request.update_status_finished', $borrowing->id) }}" method="POST"
                                        id="finishForm">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-primary btn-sm text-white"
                                            onclick="confirmDelete(event)">Finish</button>
                                    </form>
                                    @endif
                                    <form action="{{ route('borrow_request.destro', $borrowing->id) }}" method="POST"
                                        id="deleteForm">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm text-white"
                                            onclick="confirmDelete(event)">Delete</button>
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
            selectHtml += '<option value="pending">Pending</option>';
            selectHtml += '<option value="verified">Verified</option>';
            selectHtml += '<option value="approved">Approved</option>';
            selectHtml += '<option value="borrowing">Borrowing</option>';
            selectHtml += '<option value="rejected">Rejected</option>';
            selectHtml += '</select>';

            $('.selectHtml').html(selectHtml);

            $('.selectHtml').on('change', 'select', function() {
                var category = $(this).val();
                table.column(4).search(category).draw();
            });
        });
    </script>
@endpush
