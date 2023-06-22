@push('head')
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
@endpush
<div class="modal fade" id="CreateBorrowRequestModal{{ $asset->id }}" tabindex="-1" role="dialog"
    aria-labelledby="CreateBorrowRequestModalLabel" aria-hidden="true" data-asset-id="{{ $asset->id }}">
    <!-- Modal content -->
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
                        <input type="hidden" name="asset_id" value="{{ $asset->id }}">
                        <input type="hidden" name="status" value="pending">
                    </div>
                    <div class="form-group">
                        <label for="supervisor">Pengawas</label>
                        <select class="form-control" id="mySelect" name="supervisor_id" required>
                            @foreach ($users as $user)
                                @if ($user->role == 'supervisor')
                                    <option value="{{ $user->supervisor->id }}">{{ $user->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="start_timestamp{{ $asset->id }}">Waktu Mulai</label>
                        <input type="text" class="form-control flatpckr" id="start_timestamp{{ $asset->id }}"
                            name="start_timestamp" required>
                    </div>
                    <div class="form-group">
                        <label for="end_timestamp{{ $asset->id }}">Waktu Selesai</label>
                        <input type="text" class="form-control flatpckr" id="end_timestamp{{ $asset->id }}"
                            name="end_timestamp" required>
                    </div>
                    <div class="form-group">
                        @if ($asset->category == 'tool')
                            <label for="amount_borrowed{{ $asset->id }}">Jumlah yang dipinjam</label>
                            <input type="number" class="form-control" id="amount_borrowed{{ $asset->id }}"
                                name="amount_borrowed" placeholder="total" required max="{{ $asset->stock }}">
                        @else
                            <input type="hidden" name="amount_borrowed" value="0">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="activity{{ $asset->id }}">Aktivitas</label>
                        <textarea class="form-control" id="activity{{ $asset->id }}" name="activity" placeholder="Masukkan Aktivitas Anda"
                            required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Mengajukan Peminjaman</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('body')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(document).ready(function() {
            // Get the scheduled assets data
            var scheduleArray = {!! json_encode($bookedAssets) !!};

            $('.flatpckr').each(function() {
                var assetId = $(this).closest('.modal').data('asset-id');

                var filteredSchedules = Array.isArray(scheduleArray) ? scheduleArray.filter(function(
                    schedule) {
                    return schedule.asset_id === assetId;
                }) : [];

                var disableDates = function(date) {
                    for (var i = 0; i < filteredSchedules.length; i++) {
                        var schedule = filteredSchedules[i];
                        var startDate = new Date(schedule.start_timestamp);
                        var endDate = new Date(schedule.end_timestamp);
                        if (date >= startDate && date <= endDate) {
                            return true;
                        }
                    }
                    return false;
                };

                $(this).flatpickr({
                    enableTime: true,
                    minDate: 'today',
                    altInput: true,
                    altFormat: 'd F Y H:i',
                    dateFormat: 'Y-m-d H:i',
                    minTime: '08:00',
                    maxTime: '18:00',
                    time_24hr: true,
                    disable: [
                        disableDates
                    ]
                });
            });
        });
    </script>
@endpush
