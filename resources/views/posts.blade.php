@extends('layouts.main')
@section('container')

    <h1 class="text-center text-4xl mt-10 font-bold"> All Post </h1>
    <div class="columns-1 px-10 ...">
        @if ($posts->count())
            <div
                class="w-auto bg-white rounded-lg border my-10 border-gray-200 shadow-xl dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    @if ($posts[0]->image)
                        <img class="rounded-t-lg w-full lg:h-96 md:h-40 " src="{{ asset('post-image/' . $posts[0]->image) }}"
                            alt="{{ $posts[0]->category->name }}">
                    @else
                        <img class="rounded-t-lg w-full lg:h-96 md:h-40 " src="{{ asset('img/1.png') }}"
                            alt="{{ $posts[0]->category->name }}">
                    @endif
                </a>
                <div class="p-10">
                    <span
                        class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ $posts[0]->category->name }}</span>

                    {{-- <span
                        class="bg-red-600 text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">New
                        Post</span> --}}

                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $posts[0]->title }}</h5>
                    </a>
                    <p>
                        <small class="text-muted">
                            By. <a href="/posts?author={{ $posts[0]->author->username }}"
                                class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a
                                class="text-decoration-none"
                                href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
                            {{ $posts[0]->created_at->diffForHumans() }}
                    </p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $posts[0]->excerpt }}</p>
                    <a href="/posts/{{ $posts[0]->slug }}"
                        class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="px-10 grid md:grid-cols-4  grid-cols-1 gap-4 ">

                @foreach ($posts->skip(1) as $post)
                    <div
                        class="max-w-sm bg-white rounded-lg border my-10 overflow-hidden border-gray-200 shadow-xl dark:bg-gray-800 dark:border-gray-700">

                        <a href="#">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                                    class="">
                            @else
                                <img src="{{ asset('img/1.png') }}" class="w-40 mx-auto mt-10"
                                    alt="{{ $post->category->name }}">
                            @endif
                            {{-- @if ($posts[0]->image)
                        <img class="rounded-t-lg w-full lg:h-96 md:h-40 " src="{{ asset('storage/' . $posts[0]->image) }}"
                            alt="{{ $posts[0]->category->name }}">
                    @else
                        <img class="rounded-t-lg w-full lg:h-96 md:h-40 " src="{{ asset('img/1.png') }}"
                            alt="{{ $posts[0]->category->name }}">
                    @endif --}}
                        </a>
                        <div class="p-10">
                            <span
                                class="bg-blue-100 text-blue-800 text-[9px] md:text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ $post->category->name }}</span>
                            <p>
                                <small class="text-muted">
                                    By. <a href="/posts?author={{ $post->author->username }}"
                                        class="text-decoration-none">{{ $post->author->name }}</a>
                                    {{ $post->created_at->diffForHumans() }}
                                </small>
                            </p>
                            <a href="/posts/{{ $post->slug }}" class="">
                                <h5 class="mb-2 md:text-2xl text-xl  font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $post->title }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                                technology
                                acquisitions of 2021 so far, in reverse chronological order.</p>
                            <a href="/posts/{{ $post->slug }}"
                                class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Read more
                                <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-center mb-20 mt-10">
                <div>
                    {{ $posts->links('pagination::tailwind') }}
                </div>
            </div>
        @else
            <p class="text-center fs-4">No Post found.</p>
        @endif


    </div>
    <div class=" md:px-40 px-10 grid gap-2 grid-cols-1 md:grid-cols-2 mb-44">
        <div class="columns-1 md:px-10 ...">

            <div
                class="w-auto bg-white rounded-lg border mb-10 border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="p-10">

                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Tags</h5>
                    </a>
                    <div class="grid grid-cols-4 gap-4">
                        @foreach ($tags as $t)
                        <div class="rounded bg-[#6C757D]">

                            <a href="#" class="bg-[#6C757D] block rounded-sm text-white text-center text-xs font-semibold dark:bg-gray-700 dark:text-gray-300">{{  $t->name }}</a href="#">
                        </div>
                        @endforeach
                      </div>
                    {{-- <span
                        class="bg-[#DC3545] text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">Red</span>
                    <span
                        class="bg-[#17A2B8] text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">Tosca</span>
                    <span
                        class="bg-[#28A145] text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">Green</span>
                    <span
                        class="bg-yellow-500 text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">Yellow</span> --}}
                    {{-- <span
                        class="bg-indigo-500 text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-900">Indigo</span>
                    <span
                        class="bg-purple-500 text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-purple-200 dark:text-purple-900">Purple</span>
                    <span
                        class="bg-pink-500 text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-pink-200 dark:text-pink-900">Pink</span> --}}
                </div>


            </div>

        </div>
        <div
            class="w-auto shadow-md bg-white p-5 rounded-lg border md:mb-10 border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col">
                <div class="text-gray-400 font-bold uppercase">
                    Categories
                </div>

                <div class="flex flex-col items-stretch mt-5">
                    @foreach ($kategori as $k)
                        <div
                            class="flex flex-row group px-4 py-8
                        border-t hover:cursor-pointer
                        transition-all duration-200 delay-100">


                            <div class="rounded md:py-4">
                                @if ($k->file_upload != null)
                                    <img src="{{ asset('categories/'.$k->file_upload) }}" width="75px"  alt="{{ $k->name }}" class="rounded">
                                @else
                                    <img src="{{ asset('img/1.png') }}" width="75px" alt="default" class="rounded">
                                @endif
                            </div>


                            <div class="grow flex flex-col pl-5 pt-2">
                                <div class="font-bold text-sm md:text-lg lg:text-xl group-hover:underline">
                                    {{ $k->name }}
                                </div>

                                {{-- <div
                                    class="font-semibold text-sm md:text-md lg:text-lg
                                text-gray-400 group-hover:text-gray-500
                                transition-all duration-200 delay-100">
                                    Everything starts here
                                </div> --}}
                            </div>


                            <i
                                class="mdi mdi-chevron-right text-gray-400 mdi-24px my-auto pr-2
                            group-hover:text-gray-700 transition-all duration-200 delay-100"></i>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>



    </div>
    {{-- @if ($posts->count())
        <div class="card mb-3">
            @if ($posts[0]->image)
                <div style="max-height: 400px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}"
                        class="img-fluid">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top"
                    alt="{{ $posts[0]->category->name }}">
            @endif
            <div class="card-body text-center">
                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
                    <h3 class="card-title">{{ $posts[0]->title }}</h3>
                </a>
                <p>
                    <small class="text-muted">
                        By. <a href="/posts?author={{ $posts[0]->author->username }}"
                            class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a
                            class="text-decoration-none"
                            href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>

                <a class="text-decoration-none btn btn-primary" href="/posts/{{ $posts[0]->slug }}">Read More..</a>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute bg-dark px-3 py-2 text-white"
                                style="background-color: rgba(0, 0, 0, 0.7)"><a
                                    href="/posts?category={{ $post->category->slug }}"
                                    class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                                    class="img-fluid">
                            @else
                                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}"
                                    class="card-img-top" alt="{{ $post->category->name }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p>
                                    <small class="text-muted">
                                        By. <a href="/posts?author={{ $post->author->username }}"
                                            class="text-decoration-none">{{ $post->author->name }}</a>
                                        {{ $post->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No Post found.</p>
    @endif --}}
@endsection
