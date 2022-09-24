@extends('layouts.main')
@section('container')
    {{-- <h1 class="mb-5">Post Categories</h1>

    <div class="container">
        <div class="row mb-5">
            @foreach ($categories as $category)
                <div class="col-md-4 mb-3">
                    <a href="/posts?category={{ $category->slug }}">
                        <div class="card bg-dark text-white">
                            <img src="https://source.unsplash.com/500x500?{{ $category->name }}" class="card-img"
                                alt="{{ $category->name }}">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title text-center flex-fill p-4 fs-3"
                                    style="background-color: rgba(0, 0, 0, 0.7)">{{ $category->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div> --}}
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none ">
          <h2 class="text-2xl font-bold text-gray-900">Post Categories</h2>

          <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
              @foreach ($categories as $category)
              {{-- <div class="col-md-4 mb-3">
                  <a href="/posts?category={{ $category->slug }}">
                      <div class="card bg-dark text-white">
                          <img src="https://source.unsplash.com/500x500?{{ $category->name }}" class="card-img"
                              alt="{{ $category->name }}">
                          <div class="card-img-overlay d-flex align-items-center p-0">
                              <h5 class="card-title text-center flex-fill p-4 fs-3"
                                  style="background-color: rgba(0, 0, 0, 0.7)">{{ $category->name }}</h5>
                          </div>
                      </div>
                  </a>
              </div> --}}
              <div class="group relative">
                  <a href="/posts?category={{ $category->slug }}">
                <div class="relative h-80 w-full overflow-hidden rounded-lg bg-white group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                  <img src="https://source.unsplash.com/500x500?{{ $category->name }}" alt="{{ $category->name }}" class="h-full w-full object-cover object-center">
                </div>
                <div class="mt-6 text-sm text-gray-500">
                  {{-- <a href="#">
                    <span class="absolute inset-0"></span>
                    Desk and Office
                  </a> --}}
                </div>
                <p class="text-base font-semibold text-gray-900">{{ $category->name }}</p>
              </a>
              </div>
          @endforeach
          </div>
        </div>
      </div>
@endsection
