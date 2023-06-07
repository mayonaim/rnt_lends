@push('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
<div class="modal fade" id="addAssetModal" tabindex="-1" role="dialog" aria-labelledby="addAssetModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Data Asset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('addAsset') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="jenis">Jenis Asset</label>
                        <select name="category" id="jenis" class="form-control" required>
                            <option value="room">Ruangan</option>
                            <option value="tool">Alat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaAsset">Nama Asset</label>
                        <input type="text" name="name" class="form-control" id="namaAsset"
                            placeholder="Nama Asset">
                    </div>
                    <div class="form-group">
                        <label for="pic">PIC</label>
                        <select name="pic_id" id="pic" class="form-control" required>
                            <option value="">pic</option>
                            @foreach ($pics as $pic)
                                <option value="{{ $pic->id }}">{{ $pic->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="description" class="form-control" id="deskripsi" placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" class="form-control" id="stock" placeholder="Stock"
                            min="0">
                    </div>
                    <div class="form-group">
                        <label for="images">Images</label>
                        <input type="file" name="images[]" id="images" class="form-control-file dropzone" multiple
                            accept="image/jpeg,image/png" required>
                    </div>
                    <div class="form-group">
                        <label>Uploaded Images</label>
                        <div id="uploadedImages" class="d-flex flex-wrap">
                            <!-- Display uploaded images here -->
                        </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
    <script>
        // JavaScript code to display uploaded images
        function readURL(input) {
            if (input.files && input.files.length > 0) {
                var uploadedImagesContainer = document.getElementById('uploadedImages');
                uploadedImagesContainer.innerHTML = ''; // Clear the container

                var fileLimit = 3; // Maximum number of files to display
                var filesToDisplay = Math.min(input.files.length, fileLimit);

                if (input.files.length > fileLimit) {
                    // Display an error message or perform any necessary action
                    alert('You can only upload a maximum of ' + fileLimit + ' files.');
                }

                for (var i = 0; i < filesToDisplay; i++) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        var imageContainer = document.createElement('div');
                        imageContainer.classList.add('d-inline-block', 'mr-3',
                            'mb-2'); // Apply Bootstrap classes for spacing

                        var image = document.createElement('img');
                        image.src = e.target.result;
                        image.classList.add('uploaded-image');
                        image.style.maxWidth = '150px'; // Set max width for the image
                        image.style.maxHeight = '150px'; // Set max height for the image

                        imageContainer.appendChild(image);
                        uploadedImagesContainer.appendChild(imageContainer);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }
        }

        // Trigger the function when a file is selected
        document.getElementById('images').addEventListener('change', function() {
            readURL(this);
        });
    </script>
@endpush
