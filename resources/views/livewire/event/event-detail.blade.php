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
@section('title', "Event & Festival")
<section class="relative bg-white">
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
            <a href="/event-festival" class="text-gray-600 hover:underline capitalize">
                Event & Fetival
            </a>

            <span class="mx-5 text-gray-500 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>

            <a href="#" class="text-teal-600 hover:underline capitalize">
                {{ $getevent->title }}
            </a>
        </div>
    </div>
    <div class="text-center mt-12">
        <h1 class="max-w-4xl mx-auto text-3xl font-semibold text-gray-800 capitalize lg:text-4xl">
            {{ $getevent->title }}
        </h1>
    </div>
    <div class="max-w-6xl px-6 xl:px-0 mx-auto mt-4 py-8">
        <div class="lg:flex lg:-mx-6">
            <div class="lg:w-3/4 lg:px-6">
                <img class="object-cover object-center w-full h-80 xl:h-[28rem] rounded-xl shadow-md"
                    src="{{ asset('storage/event-festival') }}/{{ $getevent->image_featured }}" alt="">

                <div class="pb-12">
                    <div class="">
                        <div class="flex items-center my-6 justify-between">
                            <div class="flex items-center">
                                @if ($getevent->user->profile_photo_path != null)
                                    <img class="object-cover object-center w-10 h-10 rounded-full"
                                        src="{{ asset('storage/profile/avatar') }}/{{ $getevent->user->profile_photo_path }}"
                                        alt="">
                                @else
                                    <img class="object-cover object-center w-10 h-10 rounded-full"
                                        src="{{ asset('assets/user-default.png') }}" alt="">
                                @endif

                                <div class="mx-4">
                                    <h1 class="text-sm text-gray-700">{{ $getevent->user->name }}
                                    </h1>
                                    <p class="text-sm text-gray-500">rolename</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="flex items-center">
                                    <div
                                        class="inline-flex items-center justify-center w-10 h-10 text-gray-500 font-bold transition-all rounded-full focus:shadow-outline">
                                        @livewire('event.eventvote', ['getevent' => $getevent], key($getevent->id))
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <button
                                        class="inline-flex items-center justify-center w-10 h-10 font-semibold text-gray-400 text-xs transition-all rounded-full focus:shadow-outline">
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
                                        class="font-semibold text-gray-400 text-xs ml-1">{{ $getevent->viewer }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <h1 class=" mt-4 text-lg font-medium leading-tight text-gray-800 max-w-3xl">
                                {{ $getevent->description }}
                            </h1>
                        </div>
                    </div>

                    <article class="prose text-sm text-justify max-w-3xl">
                        {!! $getevent->content !!}
                    </article>
                </div>
                <div class="flex justify-between items-center font-semibold border-t border-solid pt-12 mb-12">
                    @if (!is_null($previous))
                        <a href="{{ route('detail-event', $previous->slug) }}">
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
                        <a href="{{ route('detail-event', $next->slug) }}">
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
                    @livewire('event.comment', ['id' => $getevent->id])
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
</section>
