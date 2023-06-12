@push('head')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endpush
<div class="modal fade" id="CreateBorrowRequestModal ' + row.id + '" tabindex="-1" role="dialog"
    aria-labelledby="CreateBorrowRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CreateBorrowRequestModalLabel">Buat Pengajuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('borrow_request.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="borrower_id" value="{{ $borrowerId }}">
                        <input type="hidden" name="asset_id" value=" ' + row.id + '">
                    </div>
                    <div class="form-group">
                        <label for="supervisor">Supervisor</label>
                        <select class="form-control" id="supervisor" name="supervisor_id" required>
                            <option value="">Select Supervisor</option>
                            @foreach ($supervisors as $supervisor)
                                <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="start_timestamp">Waktu Mulai</label>
                        <input type="datetime-local" class="form-control" id="start_timestamp" name="start_timestamp"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="end_timestamp">Waktu Selesai</label>
                        <input type="datetime-local" class="form-control" id="end_timestamp" name="end_timestamp"
                            required>
                    </div>
                    <div class="form-group">
                        @if ($asset->category == 'tool')
                            <label for="borrowed_amount">Jumlah yang dipinjam</label>
                            <input type="number" class="form-control" id="borrowed_amount" name="borrowed_amount"
                                placeholder="total" required>
                        @else
                            <input type="hidden" name="borrowed_amount" value="0">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="activity">Ativitas</label>
                        <textarea class="form-control" id="activity" name="activity" placeholder="Enter request activity" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Borrowing Request</button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('body')
    <script>
        $(document).ready(function() {
            $('#supervisor').select2({
                theme: 'bootstrap'
            });
        });
    </script>
    <script>
        $scheduleArray = array_filter($scheduled, function($item) {
            return in_array($item['asset_id'], {{ $asset->id }});
        });
        $disabledDates = array_map(function($item) {
            return [
                'from' => $item['start_timestamp'],
                'to' => $item['end_timestamp']
            ];
        }, $scheduleArray);
        flatpickr('#start_timestamp', {
            enableTime: true,
            minDate: 'today',
            dateFormat: 'd-m-Y h:i', // Display format
            altInput: true,
            altFormat: 'Y-m-d H:i', // Data format compatible with SQL
        });
        flatpickr('#end_timestamp', {
            enableTime: true,
            minDate: 'today',
            dateFormat: 'd-m-Y h:i', // Display format
            altInput: true,
            altFormat: 'Y-m-d H:i', // Data format compatible with SQL
        });
    </script>
@endpush
