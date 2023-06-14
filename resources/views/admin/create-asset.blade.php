@push('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
@endpush
<div class="modal fade" id="CreateAssetModal" tabindex="-1" role="dialog" aria-labelledby="CreateAssetModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CreateAssetModalLabel">Tambah Data Asset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('asset.store') }}" method="POST" enctype="multipart/form-data" id="image-upload" class="dropzone">
                    @csrf
                    <div class="form-group">
                        <label for="jenis">Jenis Asset</label>
                        <select class="form-control" id="jenis" name="category" required>
                            <option value="room">Ruangan</option>
                            <option value="tool">Alat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaAsset">Nama Asset</label>
                        <input type="text" class="form-control" id="namaAsset" name="name"
                            placeholder="Nama Asset">
                    </div>
                    <div class="form-group">
                        <label for="pic">PIC</label>
                        <select class="form-control" id="pic" name="pic_id" required>
                            <option value="">pic</option>
                            @foreach ($users as $user)
                                @if ($user->role == 'pic')
                                <option value="{{ $user->pic->id }}">{{ $user->pic->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="description" class="form-control" id="aktivitas" placeholder="deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" class="form-control" id="stock" placeholder="Stock"
                            min="0">
                    </div>
                    {{-- <div class="form-group">
                        <label for="images">Images</label>
                        <input type="file" name="images[]" id="images" class="form-control-file dropzone" multiple
                            accept="image/jpeg,image/png" required>
                    </div>
                    <div class="form-group">
                        <label>Uploaded Images</label>
                        <div id="uploadedImages" class="d-flex flex-wrap">
                            <!-- Display uploaded images here -->
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <label for="images">Images</label>
                        <!--<input type="file">-->
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
@endpush
