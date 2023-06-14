@push('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
<div class="modal fade" id="EditUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="CreateAssetModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CreateAssetModalLabel">Edit Data Asset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control"
                            value="{{ $user->username }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control">
                            <option value="borrower" {{ $user->role === 'borrower' ? 'selected' : '' }}>Peminjam</option>
                            <option value="supervisor" {{ $user->role === 'supervisor' ? 'selected' : '' }}>Penanggung Jawab</option>
                            <option value="pic" {{ $user->role === 'pic' ? 'selected' : '' }}>PIC</option>
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            <!-- Add more options for different roles if needed -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
            </div>

        </div>
    </div>
</div>

@push('body')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
@endpush
