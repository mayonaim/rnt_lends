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
                <form action="{{ route('asset.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="category">Jenis Asset</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="room">Ruangan</option>
                            <option value="tool">Alat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaAsset">Nama Asset</label>
                        <input type="text" class="form-control" id="namaAsset" name="name"
                            placeholder="Nama Asset" required>
                    </div>
                    <div class="form-group">
                        <label for="pic">PIC</label>
                        <select name="pic_id" class="form-control" id="pic" required>
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
                    <div class="form-group">
                        <label for="images">Images</label>
                        <input type="file" name="images" id="images" class="form-control-file" multiple
                            accept="image/jpeg,image/png" required>
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
