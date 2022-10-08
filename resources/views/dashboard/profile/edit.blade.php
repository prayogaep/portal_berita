@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Profile</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/update/{{ $profile->id }}" class="mb-5" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    required autofocus value="{{ old('email', Auth::user()->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                    required autofocus value="{{ old('username', Auth::user()->username) }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    required autofocus value="{{ old('nama', $profile->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="profesi" class="form-label">Profesi</label>
                <input type="text" class="form-control @error('profesi') is-invalid @enderror" id="profesi"
                    name="profesi" required autofocus value="{{ old('profesi', $profile->profesi) }}">
                @error('profesi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact"
                    name="contact" required autofocus value="{{ old('contact', $profile->contact) }}">
                @error('contact')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Foto</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="description" type="hidden" name="description"
                    value="{{ old('description', $profile->description) }}">
                <trix-editor input="description"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
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
