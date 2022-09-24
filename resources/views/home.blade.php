@extends('layouts.main')

@section('container')
<h1 class="text-center text-4xl mt-10 font-bold"> All Post </h1>

<div class="columns-1 px-10 ...">

    <div
        class="w-auto bg-white rounded-lg border my-10 border-gray-200 shadow-xl dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg w-full lg:h-96 md:h-40 " src="{{ asset('1.png') }}" alt="">
        </a>
        <div class="p-10">
            <span
                class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Default</span>

            <span
                class="bg-red-600 text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">New
                Post</span>

            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                    technology acquisitions 2021</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                acquisitions of 2021 so far, in reverse chronological order.</p>
            <a href="#"
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

</div>
<div class="px-10 grid md:grid-cols-4  grid-cols-1 gap-4 ">

    <div
        class="max-w-sm bg-white rounded-lg border my-10 border-gray-200 shadow-xl dark:bg-gray-800 dark:border-gray-700">

        <a href="#">
            <img class="rounded-t-lg" src="{{ asset('1.png') }}" alt="">
        </a>
        <div class="p-10">
            <span
                class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Default</span>
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                    technology acquisitions 2021</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                acquisitions of 2021 so far, in reverse chronological order.</p>
            <a href="#"
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
    <div
        class="max-w-sm bg-white rounded-lg border my-10 border-gray-200 shadow-xl dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg" src="{{ asset('1.png') }}" alt="">
        </a>
        <div class="p-10">
            <span
                class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Default</span>
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                    technology acquisitions 2021</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                acquisitions of 2021 so far, in reverse chronological order.</p>
            <a href="#"
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
    <div
        class="max-w-sm bg-white rounded-lg border my-10 border-gray-200 shadow-xl dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg" src="{{ asset('1.png') }}" alt="">
        </a>
        <div class="p-10">
            <span
                class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Default</span>
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                    technology acquisitions 2021</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                acquisitions of 2021 so far, in reverse chronological order.</p>
            <a href="#"
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
    <div
        class="max-w-sm bg-white rounded-lg border my-10 border-gray-200 shadow-xl dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg" src="{{ asset('1.png') }}" alt="">
        </a>
        <div class="p-10">
            <span
                class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Default</span>
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                    technology acquisitions 2021</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                acquisitions of 2021 so far, in reverse chronological order.</p>
            <a href="#"
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



</div>


<div class=" md:px-40 px-10 grid gap-2 grid-cols-1 md:grid-cols-2 mb-44">
    <div class="columns-1 md:px-10 ...">

        <div
            class="w-auto bg-white rounded-lg border my-10 border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="p-10">

                <a href="#">
                    <h5 class="mb-2 text-2xl  font-bold tracking-tight text-gray-900 dark:text-white">Tags</h5>
                </a>
                <span
                    class="bg-[#6C757D] text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">Dark</span>
                <span
                    class="bg-[#DC3545] text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">Red</span>
                <span
                    class="bg-[#17A2B8] text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">Tosca</span>
                <span
                    class="bg-[#28A145] text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">Green</span>
                <span
                    class="bg-yellow-500 text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">Yellow</span>
                <span
                    class="bg-indigo-500 text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-900">Indigo</span>
                <span
                    class="bg-purple-500 text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-purple-200 dark:text-purple-900">Purple</span>
                <span
                    class="bg-pink-500 text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-pink-200 dark:text-pink-900">Pink</span>
            </div>


        </div>

    </div>
    <div
        class="w-auto shadow-md bg-white p-5 rounded-lg border md:my-10 border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col">
            <div class="text-gray-400 font-bold uppercase">
                Continue With
            </div>

            <div class="flex flex-col items-stretch mt-5">

                <div
                    class="flex flex-row group px-4 py-8
                    border-t hover:cursor-pointer
                    transition-all duration-200 delay-100">


                    <div class="rounded-xl bg-blue-100 px-3 py-2 md:py-4">
                        <i
                            class="mdi mdi-home-outline mx-auto
                            text-indigo-900 text-2xl md:text-3xl"></i>
                    </div>


                    <div class="grow flex flex-col pl-5 pt-2">
                        <div class="font-bold text-sm md:text-lg lg:text-xl group-hover:underline">
                            Home Page
                        </div>

                        <div
                            class="font-semibold text-sm md:text-md lg:text-lg
                            text-gray-400 group-hover:text-gray-500
                            transition-all duration-200 delay-100">
                            Everything starts here
                        </div>
                    </div>


                    <i
                        class="mdi mdi-chevron-right text-gray-400 mdi-24px my-auto pr-2
                        group-hover:text-gray-700 transition-all duration-200 delay-100"></i>
                </div>


                <div
                    class="flex flex-row group px-4 py-8
                    border-t hover:cursor-pointer
                    transition-all duration-200 delay-100">


                    <div class="rounded-xl bg-blue-100 px-3 py-2 md:py-4">
                        <i
                            class="mdi mdi-book-open-page-variant-outline mx-auto
                            text-indigo-800 text-2xl md:text-3xl"></i>
                    </div>


                    <div class="grow flex flex-col pl-5 pt-2">
                        <div class="font-bold text-sm md:text-lg lg:text-xl group-hover:underline">
                            Blog
                        </div>

                        <div
                            class="font-semibold text-sm md:text-md lg:text-lg
                            text-gray-400 group-hover:text-gray-500
                            transition-all duration-200 delay-100">
                            Read our awesome articles
                        </div>
                    </div>


                    <i
                        class="mdi mdi-chevron-right text-gray-400 mdi-24px my-auto pr-2
                        group-hover:text-gray-700 transition-all duration-200 delay-100"></i>
                </div>


                <div
                    class="flex flex-row group px-4 py-8
                    border-t hover:cursor-pointer
                    transition-all duration-200 delay-100">


                    <div class="rounded-xl bg-blue-100 px-3 py-2 md:py-4">
                        <i
                            class="mdi mdi-archive-settings-outline
                            mx-auto text-indigo-800 text-2xl md:text-3xl"></i>
                    </div>


                    <div class="grow flex flex-col pl-5 pt-2">
                        <div class="font-bold text-sm md:text-lg lg:text-xl group-hover:underline">
                            Archive
                        </div>

                        <div
                            class="font-semibold text-sm md:text-md lg:text-lg
                            text-gray-400 group-hover:text-gray-500
                            transition-all duration-200 delay-100">
                            Archived posts but still readable
                        </div>
                    </div>


                    <i
                        class="mdi mdi-chevron-right text-gray-400 mdi-24px my-auto pr-2
                        group-hover:text-gray-700 transition-all duration-200 delay-100"></i>
                </div>


                <div
                    class="flex flex-row group px-4 py-8
                    border-t hover:cursor-pointer
                    transition-all duration-200 delay-100">


                    <div class="rounded-xl bg-blue-100 px-3 py-2 md:py-4">
                        <i
                            class="mdi mdi-at mx-auto
                            text-indigo-800 text-2xl md:text-3xl"></i>
                    </div>


                    <div class="grow flex flex-col pl-5 pt-2">
                        <div class="font-bold text-sm md:text-lg lg:text-xl group-hover:underline">
                            Contact
                        </div>

                        <div
                            class="font-semibold text-sm md:text-md lg:text-lg
                            text-gray-400 group-hover:text-gray-500
                            transition-all duration-200 delay-100">
                            Contact us for your questions
                        </div>
                    </div>


                    <i
                        class="mdi mdi-chevron-right text-gray-400 mdi-24px my-auto pr-2
                        group-hover:text-gray-700 transition-all duration-200 delay-100"></i>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection

