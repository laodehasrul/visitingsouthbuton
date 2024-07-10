@push('js')
    <script>
        Livewire.on('comment_store', commentId => {
            var commentScroll = document.getElementById('comment-' + commentId);
            commentScroll.scrollIntoView({
                behavior: 'smooth'
            }, true);
        })
    </script>
@endpush
@push('style')
    <style>
        article>p>img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
@endpush
@section('title', "Berita")
<section class="relative bg-white pt-16 md:pt-0">
    <div class="bg-gray-200">
        <div
            class="max-w-6xl px-6 xl:px-0 mx-auto flex  items-center text-xs md:text-sm lg:text-md py-4 lg:whitespace-nowrap">
            <a href="#" class="text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </a>
            <span class="mx-5 text-gray-500 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>
            <a href="/berita" class="text-gray-600 hover:underline capitalize">
                Berita
            </a>

            <span class="mx-5 text-gray-500 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>

            <a href="#" class="text-teal-600 hover:underline capitalize">
                {{ $getberita->title }}
            </a>
        </div>
    </div>
    <div class="text-center mt-12">
        <h1 class="max-w-4xl mx-auto text-3xl font-semibold text-gray-800 capitalize lg:text-4xl">
            {{ $getberita->title }}
        </h1>
    </div>
    <div class="max-w-6xl px-6 xl:px-0 mx-auto mt-4 py-8">
        <div class="lg:flex lg:-mx-6">
            <div class="lg:w-3/4 lg:px-6">
                <img class="object-cover object-center w-full h-80 xl:h-[28rem] rounded-xl shadow-md"
                    src="{{ asset('storage/berita') }}/{{ $getberita->image_featured }}" alt="">

                <div class="pb-12">
                    <div class="">
                        <div class="flex items-center my-6 justify-between">
                            <div class="flex items-center">
                                @if ($getberita->user->profile_photo_path != null)
                                    <img class="object-cover object-center w-10 h-10 rounded-full"
                                        src="{{ asset('storage/profile/avatar') }}/{{ $getberita->user->profile_photo_path }}"
                                        alt="">
                                @else
                                    <img class="object-cover object-center w-10 h-10 rounded-full"
                                        src="{{ asset('assets/user-default.png') }}" alt="">
                                @endif

                                <div class="mx-4">
                                    <h1 class="text-sm text-gray-700">{{ $getberita->user->name }}
                                    </h1>
                                    <p class="text-sm text-gray-500">rolename</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-2">
                                <div class="flex items-center">
                                    <div
                                        class="inline-flex items-center justify-center w-10 h-10 text-gray-500 font-bold transition-all rounded-full focus:shadow-outline">
                                        @livewire('berita.beritavote', ['getberita' => $getberita], key($getberita->id))
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <button
                                        class="inline-flex items-center justify-center w-10 h-10 text-gray-500 font-bold transition-all rounded-full focus:shadow-outline">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                    </button>
                                    <span
                                        class="font-semibold text-gray-500 text-sm ml-2">{{ $getberita->viewer }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <h1 class=" mt-4 text-lg font-medium leading-tight text-gray-800 max-w-3xl">
                                {{ $getberita->description }}
                            </h1>
                        </div>
                    </div>

                    <article class="prose text-sm text-justify max-w-3xl">
                        {!! $getberita->content !!}
                    </article>
                </div>
                <div class="flex justify-between items-center font-semibold border-t border-solid pt-12 mb-12">
                    @if (!is_null($previous))
                        <a href="{{ route('getberita', $previous->slug) }}">
                            <div class="text-left">
                                <p class="text-xs text-gray-500">Previous Article</p>
                                <p class="hover:text-red-400">{{ $previous->title }}</p>
                            </div>
                        </a>
                    @else
                        <button class="rotate-180">
                            <svg class="h-6 w-6 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </button>
                    @endif
                    @if (!is_null($next))
                        <a href="{{ route('getberita', $next->slug) }}">
                            <div class="text-right">
                                <p class="text-xs text-gray-500">Next Article</p>
                                <p class="hover:text-red-400">{{ $next->title }}</p>
                            </div>
                        </a>
                    @else
                        <button>
                            <svg class="h-6 w-6 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </button>
                    @endif
                </div>
                <div class="border border-solid rounded-md p-4">
                    @livewire('berita.comment', ['id' => $getberita->id])
                </div>
            </div>
            <div class="relative w-full md:w-1/3">
                <div class="relative min-h-[1px] h-full px-4">
                    <div class="sticky w-full top-0 bg-white">
                        <div class="relative">
                            <div class="text-xl font-bold flex items-center mb-5">
                                <h1 class="w-full">Destinasi Populer</h1>
                                <div class="bg-gray-500 h-1 w-full"></div>
                            </div>
                            <ul class="relative">
                                @foreach (get_wisata() as $index => $items)
                                    @if ($loop->first)
                                        <li class="group border-b-[3px] pb-4">
                                            <div class="rounded-md">
                                                <a
                                                    href="{{ route('detail-post', [$items->category->slug, $items->slug]) }}">
                                                    <img class="rounded-md w-full h-[350px] lg:h-auto object-cover min-h-[200px] min-w-[350px]"
                                                        src="{{ asset('storage/destinasi') }}/{{ $items->image_featured }}"
                                                        alt="">
                                                </a>
                                            </div>
                                            <h3 class="flex items-start text-xl font-bold mt-2 leading-none">
                                                <a href="{{ route('detail-post', [$items->category->slug, $items->slug]) }}"
                                                    class="flex">
                                                    <div class="w-full mr-2 lg:w-[80%]">
                                                        <p
                                                            class="group-hover:text-teal-500 transform transition-all delay-100 ease-in-out">
                                                            {{ $items->name }}</p>
                                                        <p class="text-sm text-gray-500 font-normal">
                                                            {{ $items->description }}</p>
                                                    </div>

                                                    <span
                                                        class="border-l pl-2 lg:w-[20%] items-start justify-start text-gray-400 text-2xl mx-auto text-center">0{{ $index + 1 }}</span>
                                                </a>

                                            </h3>
                                        </li>
                                    @endif
                                    @if ($index)
                                        <li class="group mt-4">
                                            <h3 class="flex items-start text-md font-semibold mt-2 leading-none">
                                                <a href="{{ route('detail-post', [$items->category->slug, $items->slug]) }}"
                                                    class="relative flex w-auto h-auto">
                                                    <div
                                                        class="relative items-start justify-start text-md text-start mr-4">
                                                        <p
                                                            class="inline-flex p-3 bg-gray-200 rounded-full group-hover:text-white group-hover:bg-teal-600 transform transition-all delay-100 ease-in-out">
                                                            0{{ $index + 1 }}</p>
                                                    </div>
                                                    <div class="">
                                                        <p
                                                            class="relative w-full leading-5 group-hover:text-teal-500 transform transition-all delay-100 ease-in-out">
                                                            {{ $items->name }}</p>
                                                        <p class="text-xs text-gray-500 font-normal">
                                                            {{ $items->description }}</p>
                                                    </div>


                                                </a>

                                            </h3>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="relative mt-5">
                            <div class="text-xl font-bold flex items-center mb-5">
                                <h1 class="w-full">By Categories</h1>
                                <div class="bg-gray-500 h-1 w-full"></div>
                            </div>
                            <ul>
                                <li
                                    class="border-b pb-2 hover:text-teal-500 transform transition-all delay-100 ease-in-out">
                                    <a href="/berita">Berita</a>
                                </li>
                                <li
                                    class="border-b pb-2 hover:text-teal-500 transform transition-all delay-100 ease-in-out">
                                    <a href="{{ route('profile-dinas') }}">Profil Dinas</a>
                                </li>
                                <li
                                    class="border-b pb-2 hover:text-teal-500 transform transition-all delay-100 ease-in-out">
                                    <a href="/event-festival">Event & Festival</a>
                                </li>
                                @foreach (get_category() as $item)
                                    <li
                                        class="border-b pb-2 hover:text-teal-500 transform transition-all delay-100 ease-in-out">
                                        <a href="{{ route('category', $item->slug) }}">{{ $item->title }}</a>
                                    </li>
                                    @if (count($item->childrens))
                                        @forelse ($item->childrens as $child)
                                            <li
                                                class="border-b pb-2 hover:text-teal-500 transform transition-all delay-100 ease-in-out">
                                                <a
                                                    href="{{ route('category', $child->slug) }}">{{ $child->title }}</a>
                                            </li>
                                        @empty
                                        @endforelse
                                    @else
                                    @endif
                                @endforeach
                                <li
                                    class="border-b pb-2 hover:text-teal-500 transform transition-all delay-100 ease-in-out">
                                    <a href="/video-galery">Video</a>
                                </li>
                                <li
                                    class="border-b pb-2 hover:text-teal-500 transform transition-all delay-100 ease-in-out">
                                    <a href="/peta-wisata">Peta Wisata</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden text-center overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Terms of Service
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Anda tidak memiliki akses ke fitur ini!
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Login Terlebih Dahulu.
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <a href="{{ route('login') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Login</a>
                    <button data-modal-hide="default-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                </div>
            </div>
        </div>
    </div>
</section>
