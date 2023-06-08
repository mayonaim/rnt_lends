@extends('layouts.peminjam')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="scroll-horizontal">
            <!-- Page Heading -->
            <div class="d-sm-relative align-items-center justify-content-between lg-4">
                <h2 class="h3 mb-0 text-gray-800">Riwayat Peminjaman</h2>
            </div>
            <div class="card-body">
                @include('layouts.components.dataTables')
                @push('table-headers')
                    <th>Yang Dipinjam</th>
                    <th>Penanggung Jawab</th>
                    <th>Aktivitas</th>
                    <th>Waktu Peminjaman</th>
                    <th>Status</th>
                @endpush
                @push('table-contents')
                    @foreach ($borrowings as $borrowing)
                        <td>{{ $borrowing->asset->name }}</td>
                        <td>{{ $borrowing->supervisor->name }}</td>
                        <td>{{ $borrowing->activity }}</td>
                        <td>{{ $borrowing->start_timestamp }} - {{ $borrowing->end_timestamp }}</td>
                        <td>
                            @if ($borrowing->status === 'pending')
                                <a type="button" class="btn btn-warning btn-sm text-white" data-toggle="modal"
                                    data-target="#ediBorrowingRequestModal{{ $borrowing->id }}">Edit</a>
                                @include('Peminjam.edit-borrowing-request')
                            @elseif ($borrowing->status === 'borrowing')
                                <form action="{{ route('borrow_request.update_status_finished', $borrowing->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="finished">
                                    <button type="submit" class="btn btn-success btn-sm">Mark as Finished</button>
                                </form>
                            @else
                                {{ $borrowing->status }}
                            @endif
                            <form action="{{ route('borrow_request.destroy', $borrowing->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm text-white"
                                    onclick="confirmDelete(event)">Delete</button>
                            </form>
                        </td>
                    @endforeach
                @endpush
            </div>
        </div>
    </div>
@endsection
