@extends('layouts.main')
@section('container')
    <h1 class="text-center text-4xl mt-10 font-bold">
        {{ request()->tags == true ? base64_decode(request()->tags) : 'All Tags' }} </h1>
    <div class="columns-1 px-10 ...">
        @if ($tags->count())
            @if (request()->tags == true)
                <div class="px-10 grid md:grid-cols-4  grid-cols-1 gap-4 mb-16">
                    @foreach ($tags->posts as $p)
                    <div
                    class="max-w-sm bg-white rounded-lg border my-10 overflow-hidden border-gray-200 shadow-xl dark:bg-gray-800 dark:border-gray-700">

                    <a href="#">
                        @if ($p->post->image)
                            <img src="{{ asset('storage/' . $p->post->image) }}" alt="{{ $p->post->category->name }}"
                                class="">
                        @else
                            <img src="{{ asset('img/1.png') }}" class="w-40 mx-auto mt-10"
                                alt="{{ $p->post->category->name }}">
                        @endif
                    </a>
                    <div class="p-10">
                        <span
                            class="bg-blue-100 text-blue-800 text-[9px] md:text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ $p->post->category->name }}</span>
                        <p>
                            <small class="text-muted">
                                By. <a href="/posts?author={{ $p->post->author->username }}"
                                    class="text-decoration-none">{{ $p->post->author->name }}</a>
                                {{ $p->post->created_at->diffForHumans() }}
                            </small>
                        </p>
                        <a href="/posts/{{ $p->post->slug }}" class="">
                            <h5
                                class="mb-2 md:text-2xl text-xl  font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $p->post->title }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology
                            acquisitions of 2021 so far, in reverse chronological order.</p>
                        <a href="/posts/{{ $p->post->slug }}"
                            class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                    @endforeach


                    {{-- <div class="flex justify-center mb-20 mt-10">
                        <div>
                            {{ $tags->posts->links('pagination::tailwind') }}
                        </div>
                    </div> --}}

                </div>
            @else
                <div class="px-10 grid md:grid-cols-4  grid-cols-1 gap-4 mb-16">
                    @foreach ($tags as $t)
                        <a href="/tags?tags={{ base64_encode($t->name) }}">
                            <div
                                class="max-w-sm bg-white rounded-lg border my-6 overflow-hidden border-gray-200 shadow-xl dark:bg-gray-800 dark:border-gray-700">
                                <div class="p-10">
                                    {{-- <span --}}
                                    {{-- class="bg-blue-100 text-blue-800 text-[9px] md:text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ $p->post->category->name }}</span> --}}

                                    {{-- <a href="/posts/{{ $p->post->slug }}" class=""> --}}
                                    <h5
                                        class="mb-2 md:text-2xl text-xl bg-sky-100 rounded text-center font-bold tracking-tight text-gray-900 dark:text-white">
                                        {!! $t->name !!}</h5>
                                    {{-- </a> --}}
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest
                                        enterprise
                                        technology
                                        acquisitions of 2021 so far, in reverse chronological order.</p>
                                    {{-- <a href="/posts/{{ $p->post->slug }}"
                                    class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Read more
                                    <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a> --}}
                                    <p>
                                        <small class="text-muted">
                                            Total <b>{{ $t->posts->count() }}</b> Posts
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>
                <div class="flex justify-center mb-20 mt-10">
                    <div>
                        {{ $tags->links('pagination::tailwind') }}
                    </div>
                </div>
            @endif
        @else
            <p class="text-center fs-4">No Post found.</p>
        @endif

    </div>
@endsection


{{-- @extends('layouts.main')
@section('container')
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none ">
            <h2 class="text-2xl font-bold text-gray-900">Post Tags</h2>

            <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
                @foreach ($tags as $t)
                    <div class="group relative">
                        <a href="/posts?category={{ $t->slug }}">
                            <div
                                class="relative h-80 w-full overflow-hidden rounded-lg bg-white group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                                <img src="https://source.unsplash.com/500x500?{{ $t->name }}" alt="{{ $t->name }}"
                                    class="h-full w-full object-cover object-center">
                            </div>
                            <div class="mt-6 text-sm text-gray-500">
                            </div>
                            <p class="text-base font-semibold text-gray-900">{{ $t->name }}</p>
                        </a>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
@endsection --}}
