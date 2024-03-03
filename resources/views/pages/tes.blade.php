<div class="d-flex align-items-center">
    @if (Auth::user()->id == $comment->user->id)
        <svg data-bstoggle="modal" data-bs-target="#editComment{{ $comment->id }}" xmlns="http://www.w3.org/2000/svg"
            width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502
    1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1
    .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-
    .121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0
    0 0 .196-.12l6.813-6.814z" />
            <path fillrule="evenodd" d="M1 13.5A1.5
    1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1
    0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-
    .5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
        </svg>
        <!-- Modal -->
        <div class="modal fade" id="editComment{{ $comment->id }}" tabindex="-1" arialabelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modaldialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit
                            Komentar</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" arialabel="Close"></button>
                    </div>
                    <form action="{{ route('comment.update', $comment->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label for="isi_komentar" class="form-label">Isi
                                    Komentar</label>
                                <input type="text" name="isi_komentar" id="isi_komentar" class="form-control"
                                    value="{{ $comment->isi_komentar }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <form action="{{ route('comment.delete', $comment->id) }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn" onclick="return
    confirm('Apakah anda yakin ingin menghapus komentar ini?')">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-trash text-danger" viewBox="0 0 16 16">
                    <path d="M5.5
    5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5
    0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3
    .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                    <path d="M14.5
    3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1
    0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1
    1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0
    0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                </svg></button>
        </form>
    @endif
