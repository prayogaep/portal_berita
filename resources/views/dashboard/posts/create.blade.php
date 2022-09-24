@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Post</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" required autofocus value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    required value="{{ old('slug') }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        @if (old('category_id') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">

            </div>
            <div class="mb-3">
                <label for="source" class="form-label">Tags</label><br>
                {{-- <div class="mb-3">
                        <select id="search" class="myselect form-control" style="width:50%;">
                            <option value="0"></option>
                        </select>
                        <prev> Insert Tags</prev>
                    </div> --}}

                <select style="width:100%;" name="tags[]" id="source" multiple tabindex="-1" aria-hidden="true">


                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>



    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/cekSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script>
        $('#source').select2({
            tags: true
        });
        $('#search').select2({
            tags: true,
            insertTag: function(data, tag) {
                data.push(tag);
            },
            createTag: function(params) {
                return {
                    id: params.term,
                    text: params.term,
                    newTag: true
                }
            },

            matcher: matchCustom,
        }).on("select2:select", function(e) {

            //    if( e.params.data.newTag){
            select2_search($("#source"), e.params.data.text);
            $(this).find('[value="' + e.params.data.id + '"]').replaceWith('<option selected value="' + e.params
                .data.id + '">' + e.params.data.text + '</option>');
            //    }
            //uncomment if you want to play the same search
            //$("#search").val("0").trigger("change");
        });


        function matchCustom(params, data) {
            // If there are no search terms, return all of the data
            if ($.trim(params.term) === '') {
                return data;
            }

            // Do not display the item if there is no 'text' property
            if (typeof data.text === 'undefined') {
                return null;
            }


            // Return `null` if the term should not be displayed
            return null;
        }

        function select2_search($el, term) {
            $el.select2('open');

            // Get the search box within the dropdown or the selection
            // Dropdown = single, Selection = multiple
            var $search = $el.data('select2').dropdown.$search || $el.data('select2').selection.$search;
            // This is undocumented and may change in the future

            $search.val(term);
            $search.trigger('input');
        }
    </script>
@endpush
