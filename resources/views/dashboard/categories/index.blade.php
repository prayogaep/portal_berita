@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Categories</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-6" role="alert">
            {{ session('success') }}
        </div>
    @endif



    <div class="table-responsive col-lg-6">
        <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create New Category</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            @if ($category->file_upload != null)
                                <img src="{{ asset('categories/' . $category->file_upload) }}" width="100px" alt=""
                                    srcset="">
                            @else
                                Belum upload gambar
                            @endif
                        </td>
                        <td>
                            <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            @if ($category->posts->count() < 1)
                                <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline"
                                    id="delete_category{{ $category->id }}">
                                    @method('delete')
                                    @csrf
                                    <button type="button" class="badge bg-danger border-0"
                                        onclick="confirm_delete({{ $category->id }})"><span
                                            data-feather="x-circle"></span></button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function confirm_delete(id) {
            Swal.fire({
                icon: 'question',
                text: 'Do you want to delete this category?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete_category' + id).submit();
                }
            })
        }
    </script>
@endsection
