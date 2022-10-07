@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Ebook</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @error('file_upload')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror



    <div class="table-responsive col-lg-8">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Upload New Ebook
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ebook</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/dashboard/ebook" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Ebook</label>
                                <input class="form-control" type="file" id="file_upload" name="file_upload">
                                <small class="text-muted">File Must .pdf</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ebook</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ebooks as $ebook)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ebook->file_upload }}</td>
                        <td><form action="/dashboard/ebook/{{ $ebook->id }}" method="post" id="delete_post{{ $ebook->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="badge bg-danger border-0" onclick="confirm_delete({{ $ebook->id }})">Delete</button>
                        </form></td>
                    </tr>
                @empty

                @endforelse

            </tbody>
        </table>
    </div>

    <script>
        function confirm_delete(id) {
            Swal.fire({
                icon: 'question',
                text: 'Do you want to delete this post?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete_post' + id).submit();
                }
            })
        }
    </script>
@endsection
