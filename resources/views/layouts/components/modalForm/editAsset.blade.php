@push('head')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
<div class="modal fade" id="ediAssetModal{{ $asset->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editAssetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAssetModalLabel">Edit Asset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('editAsset', $asset->id) }}" enctype="multipart/form-data"
                    id="editAssetForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="{{ old('name', $asset->name) }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description">{{ old('description', $asset->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" name="stock" id="stock"
                            placeholder="{{ old('stock', $asset->stock) }}">
                    </div>
                    <div class="form-group">
                        <label for="pic_id">PIC</label>
                        <select name="pic_id" id="pic" class="form-control" required>
                            <option value="">pic</option>
                            @foreach ($pics as $pic)
                                <option value="{{ $pic->id }}"
                                    {{ old('pic_id', $asset->pic_id) == $pic->id ? 'selected' : '' }}>
                                    {{ $pic->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="images">Images</label>
                        <div id="dropzone" class="dropzone">
                            <label>Existing Images</label>
                            <div id="existingImagesList" class="d-flex flex-wrap">
                                @foreach ($asset->images as $image)
                                    <div class="mr-3 mb-2">
                                        <img src="{{ asset('storage/assets/' . $image->name) }}" alt="Asset Image"
                                            style="max-width: 150px; max-height: 150px;"
                                            class="d-inline-block existing-image">
                                        <button type="button" class="btn btn-sm btn-danger delete-image"
                                            data-image-id="{{ $image->id }}">Delete</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="category" id="category"
                            value="{{ old('category', $asset->category) }}">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;

        var dropzone = new Dropzone('#dropzone', {
            url: '{{ route('uploadAssetImage') }}',
            paramName: 'image',
            maxFilesize: 2, // Maximum file size in MB
            acceptedFiles: 'image/*', // Only allow image files
            addRemoveLinks: true,
            dictRemoveFile: 'Remove',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            init: function() {
                this.on('success', function(file, response) {
                    // Add the newly uploaded image to the form
                    var imageIdInput = document.createElement('input');
                    imageIdInput.setAttribute('type', 'hidden');
                    imageIdInput.setAttribute('name', 'imageIds[]');
                    imageIdInput.setAttribute('value', response.image_id);
                    document.getElementById('editAssetForm').appendChild(imageIdInput);
                });
                this.on('removedfile', function(file) {
                    // Remove the image ID input if the file is removed from dropzone
                    var imageIdInput = document.querySelector('input[name="imageIds[]"][value="' + file
                        .upload.uuid + '"]');
                    if (imageIdInput) {
                        imageIdInput.remove();
                    }
                });
            }
        });
    </script>
@endpush
