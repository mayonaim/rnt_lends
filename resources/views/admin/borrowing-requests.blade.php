@extends('layouts.main')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Riwayat</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="myTable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Asset</th>
                            <th>Pengawas</th>
                            <th>Aktivitas</th>
                            <th>Jumlah</th>
                            <th>Jadwal</th>
                            <th>Status</th>
                            <th>Aksi</th>
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
                                @if ($borrowing->asset->category == 'tool')
                                    <td>{{ $borrowing->amount_borrowed }}</td>
                                @else
                                    <td>-</td>
                                @endif
                                <td>{{ $startTimestamp . ' - ' . $endTimestamp }}</td>
                                <td>
                                    @if ($borrowing->status === 'pending')
                                        <div class="text-info">Diproses</div>
                                    @endif
                                    @if ($borrowing->status === 'validated')
                                        <div class="text-warning">Disetujui Penanggung Jawab</div>
                                    @endif
                                    @if ($borrowing->status === 'approved')
                                        <div class="text-success">Disetujui PIC Lab</div>
                                    @endif
                                    @if ($borrowing->status === 'borrowing')
                                        <div class="text-primary">Meminjam</div>
                                    @endif
                                    @if ($borrowing->status === 'finished')
                                        <div class="text-secondary">Selesai</div>
                                    @endif
                                    @if ($borrowing->status === 'rejected')
                                        <div class="text-danger">Ditolak</div>
                                    @endif
                                </td>
                        <td>
                                    @if ($borrowing->status === 'validated')
                                        <form action="{{ route('admin.approve_borrow_request', $borrowing->id) }}"
                                            method="POST" id="approveForm">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="approved">
                                            <button type="submit" class="btn btn-primary btn-sm text-white">Menyetujui</button>
                                        </form>
                                        <form action="{{ route('admin.reject_borrow_request', $borrowing->id) }}"
                                            method="POST" id="rejectForm">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="rejected">
                                            <button type="submit" class="btn btn-warning btn-sm text-white">Menolak</button>
                                        </form>
                                    @endif
                                    @if ($borrowing->status === 'borrowing')
                                        <form action="{{ route('borrow_request.update_status_finished', $borrowing->id) }}"
                                            method="POST" id="finishForm">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-sm text-white">Selesai</button>
                                        </form>
                                    @endif
                                    <form action="{{ route('admin.destroy_borrow_request') }}" method="POST"
                                        id="deleteForm">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{$borrowing->id}}">
                                        <button type="submit" class="btn btn-danger btn-sm text-white" onclick="confirmDelete(event)">Hapus</button>
                                    </form>
                                </td>
                            </tr>
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
