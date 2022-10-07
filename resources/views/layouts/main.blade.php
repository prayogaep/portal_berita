<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    {{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tailwind.min.css') }}" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">

    {{-- My Style --}}
    <link rel="stylesheet" href="/css/style.css">
    <title>Portal Berita | {{ $title }}</title>
</head>

<body>
    @include('sweetalert::alert')
    @include('partials.navbarTailwind')

    <div class="container mt-4">
        @yield('container')
    </div>


    @include('partials.footerTailwind')

    {{-- <script src="{{ asset('js/bootstrap.bundle.min.js') }}"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"> --}}
    </script>
    <script src="{{ asset('js/flowbite.js') }}"></script>
</body>

</html>
