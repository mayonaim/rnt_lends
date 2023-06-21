@push('head')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
<div class="modal fade" id="EditAssetModal{{ $asset->id }}" tabindex="-1" role="dialog"
    aria-labelledby="EditAssetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditAssetModalLabel">Edit Asset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.edit_asset', $asset->id) }}" enctype="multipart/form-data"
                    id="editAssetForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Asset</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="{{ old('name', $asset->name) }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" name="description" id="description">{{ old('description', $asset->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="pic_id">PIC</label>
                        <select class="form-control" id="mySelect" name="pic_id" required>
                            <option value="">pic</option>
                            @foreach ($users as $pic)
                                <option value="{{ $pic->id }}" {{ old('pic_id', $asset->pic_id) == $pic->id ? 'selected' : '' }}>{{ $pic->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category">Kategori</label>
                            <textarea class="form-control" name="category" id="category" placeholder="{{ old('category', $asset->category) }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stok</label>
                        <input type="number" class="form-control" name="stock" id="stock"
                            placeholder="{{ old('stock', $asset->stock) }}">
                    </div>
                    <div class="form-group">
                        <label for="images">Gambar</label>
                        <input type="file" name="images" id="images" class="form-control-file" value="{{ old('images', $asset->images) }}" multiple accept="image/jpeg,image/png" required>
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
