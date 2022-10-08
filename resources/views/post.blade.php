@extends('layouts.main')

@section('container')
    {{-- <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                <p> By. <a href="/posts?author={{ $post->author->username }}"
                        class="text-decoration-none">{{ $post->author->name }}</a> in <a
                        href="/categories/{{ $post->category->slug }}"
                        class="text-decoration-none">{{ $post->category->name }}</a></p>

                        @if ($post->image)
                        <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}"
                        alt="{{ $post->category->name }}" class="img-fluid">
                          </div>
                        @else
                        <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                        alt="{{ $post->category->name }}" class="img-fluid">
                        @endif

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>


                <a href="/posts" class="d-block mt-3">Back to Posts</a>
            </div>
        </div>
    </div> --}}
    <div class="container px-8 mx-auto mb-40">
        <div class="border rounded-lg shadow-lg p-10">
            <h1 class="text-2xl font-semibold mb-3">{{ $post->title }}</h1>
            <p> By. <a href="/posts?author={{ $post->author->username }}"
                    class="text-decoration-none">{{ $post->author->name }}</a> in <a
                    href="/categories/{{ $post->category->slug }}"
                    class="text-decoration-none">{{ $post->category->name }}</a></p>

            @if ($post->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('post-image/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                    alt="{{ $post->category->name }}" class="img-fluid">
            @endif

            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>


            <div class="my-10"></div>
            <a href="/posts"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Back
                to posts</a>
            <div class="my-10"></div>
            <hr class="mb-10">
            <u><h1 class="mb-5">Comments</h1></u>
            @forelse ($post->comments as $c)
            <article>
                <div class="flex items-center mb-4 space-x-4">
                    <img class="w-10 h-10 rounded-full" src="https://ui-avatars.com/api/?background=random&name={{ $c->user->username }}" alt="">
                    <div class="space-y-1 font-medium dark:text-white">
                        <p>{{ $c->user->username }} </p>
                    </div>
                </div>

                <footer class="mb-5 text-sm text-gray-500 dark:text-gray-400">
                    <p>Sent {{ $c->created_at->diffForHumans() }}</p>
                </footer>
                <p class="mb-3 font-light text-gray-500 dark:text-gray-400">{{ $c->comment }}</p>
                    <div class="flex items-center mt-3 space-x-3 divide-x divide-gray-200 dark:divide-gray-600 mb-5">
                        @if ($c->user_id == Auth::user()->id)
                        <a href="/comment/{{ base64_encode($c->id) }}" class="text-white bg-red-600 border border-gray-300 focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-xs px-2 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" onclick="return confirm('are you sure?')">Delete</a>
                        @endif
                    </div>
            </article>
            <hr class="mb-10">
            @empty
            <h1 class="text-center text-2xl mb-5 text-gray-400">No Comment Found</h1>
            <hr class="mb-10">
            @endforelse

            <form action="/comment/{{ $post->id }}" method="post">
                @csrf
                <input type="hidden" name="slug" value="{{ $post->slug }}">
                <div class="mb-4 w-full bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                    <div class="py-2 px-4 bg-white rounded-t-lg dark:bg-gray-800">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" rows="4"
                            class="px-0 w-full text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                            placeholder="Write a comment..." required="" name="comment"></textarea>
                    </div>
                    <div class="flex justify-end items-center py-2 px-3 border-t dark:border-gray-600">
                        <button type="submit"
                            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Post comment
                        </button>

                    </div>
                </div>
            </form>





        </div>
    </div>



    <div class=" md:px-40 px-10 grid gap-2 grid-cols-1 md:grid-cols-2 mb-44">
        <div class="columns-1 md:px-10 ...">

            <div
                class="w-auto bg-white rounded-lg border mb-10 border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="p-10">

                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Tags Terkait</h5>
                    </a>
                    <div class="grid grid-cols-4 gap-4">
                        @foreach ($post->tags as $t)
                            <div class="rounded bg-[#6C757D]">

                                <a href="#"
                                    class="bg-[#6C757D] block rounded-sm text-white text-center text-xs font-semibold dark:bg-gray-700 dark:text-gray-300">{{ $t->tag->name }}</a
                                    href="#">
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


                            {{-- <div class="rounded-xl bg-blue-100 px-3 py-2 md:py-4">
                                <i
                                    class="mdi mdi-home-outline mx-auto
                                text-indigo-900 text-2xl md:text-3xl"></i>
                            </div> --}}


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
@endsection
