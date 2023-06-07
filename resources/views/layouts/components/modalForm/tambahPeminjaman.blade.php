@push('head')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
<div class="modal fade" id="tambahPeminjamanModal{{ $asset->id }}" tabindex="-1" role="dialog"
    aria-labelledby="tambahPeminjamanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPeminjamanModalLabel">Pinjam {{ $asset->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('addBorrowing', $asset->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="namaAsset">Nama Asset</label>
                        <input type="text" name="name" class="form-control" id="namaAsset"
                            placeholder="Nama Asset">
                    </div>
                    <div class="form-group">
                        <label for="supervisor">Penanggung Jawab</label>
                        <select name="supervisor_id" class="form-control mySelect" id="supervisor" required>
                            @foreach ($supervisors as $supervisor)
                                <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Alasan untuk Peminjaman</label>
                        <textarea name="description" class="form-control" id="description"
                            placeholder="Deskripsikan aktivitas yang akan Anda lakukan dengan peminjaman ini"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="amountBorrowed">Jumlah yang dipinjam</label>
                        <input type="number" name="amount_borrowed" class="form-control" id="amountBorrowed" placeholder="Total"
                            min="">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="borrower_id" value="{{ $borrower->id }}">
                    </div>
                    <div class="form-group justify-content-end">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('body')
    <script>
        $(document).ready(function() {
            $('.mySelect').select2({
                placeholder: 'Select an option'
                theme: 'bootstrap-5'
            });
        });
    </script>
@endpush
