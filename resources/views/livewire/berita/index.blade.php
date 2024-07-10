@section('title', "Berita")
<div>
    <section class="pt-16 md:pt-0">
        <div class="relative bg-gray-200">
            <div
                class="max-w-6xl px-6 xl:px-0  flex items-center py-4 mx-auto overflow-y-auto text-xs md:text-sm lg:text-md whitespace-nowrap">
                <a href="{{ route('beranda') }}" class="text-gray-600">
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

                <a href="#" class="text-teal-600 underline capitalize">
                    Berita
                </a>
            </div>
        </div>
        <div class="relative max-w-6xl px-6 xl:px-0 mx-auto my-10">
            <div class="relative w-full px-5 md:px-0 md:flex space-y-5 md:space-y-0 space-x-0 md:space-x-4">
                <div class="relative w-full lg:w-2/3 space-y-8">
                    <div class="w-full flex items-center justify-between border border-solid p-4 space-x-4">
                        <div class="w-[60%] md:w-[80%] relative">
                            <div wire:target="search"
                                class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg wire:loading.remove class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <div wire:loading.delay role="status">
                                    <svg aria-hidden="true"
                                        class="w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                            fill="currentColor" />
                                        <path
                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                            fill="currentFill" />
                                    </svg>
                                </div>
                            </div>
                            <input
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                type="text" name="" id="" wire:model="search"
                                placeholder="Pencarian...">
                        </div>
                        <div class="relative w-[40%] md:w-[20%]">
                            <div class="flex items-center justify-end text-sm">
                                <span for="sort_by" class="mr-2 whitespace-nowrap">Sort By :</span>
                                <form class="max-w-sm">
                                    <select id="orderBy" wire:model="orderBy"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="created_at" selected>Terbaru</option>
                                        <option value="votes_count">Trending</option>
                                        <option value="viewer">Most Viewed</option>
                                    </select>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div wire:loading.delay wire:target="search">
                        <div role="status">
                            <svg aria-hidden="true"
                                class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div wire:loading.class="invisible" wire:target="search" class="space-y-8">

                        @forelse ($beritalist as $item)
                            <div class="mt-2">
                                <div class="flex mx-auto relative max-w-full group">
                                    <div class="relative w-1/2 overflow-hidden mr-2 rounded-md shadow-md">
                                        <a href="{{ route('getberita', $item->slug) }}">
                                            <img class="w-full h-[140px] md:h-[180px] lg:h-[200px] object-cover transform hover:scale-110 duration-200"
                                                src="{{ asset('storage/berita') }}/{{ $item->image_featured }}"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="w-1/2">
                                        <a href="{{ route('getberita', $item->slug) }}">
                                            <h1 class="uppercase text-sm md:text-md font-semibold hover:text-teal-600">
                                                {{ $item->title }}</h1>
                                        </a>
                                        <div>
                                            <div class="flex items-center space-x-2">
                                                <p class="text-xs text-gray-400 leading-relaxed">
                                                    {{ $item->user->name }},
                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                                    |
                                                </p>
                                                <div class="flex items-center space-x-2">
                                                    <div class="flex items-center">

                                                        @livewire('berita.beritavote', ['getberita' => $item], key($item->id))
                                                    </div>
                                                    <div class="flex items-center">

                                                        <button
                                                            class="inline-flex items-center justify-center w-6 h-6 text-gray-400">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                fill="currentColor" class="w-6 h-6">
                                                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </button>
                                                        <span
                                                            class="font-semibold text-gray-400 text-xs ml-1">{{ $item->viewer }}</span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <p class="text-xs text-gray-600 mt-2 leading-relaxed">
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="mt-2">Not Found Result</div>
                        @endforelse
                    </div>

                    @if (count($beritalist) >= $amount)
                        <div class="mx-auto w-full text-center justify-center">
                            <button wire:click="loadMore"
                                class="px-5 py-2.5 relative rounded group font-medium text-white font-medium inline-block">
                                <span wire:loading.remove wire:target="loadMore"
                                    class="absolute top-0 left-0 w-full h-full rounded opacity-50 filter blur-sm bg-gradient-to-br from-purple-600 to-blue-500"></span>
                                <span wire:loading.remove
                                    class="h-full w-full inset-0 absolute mt-0.5 ml-0.5 bg-gradient-to-br filter group-active:opacity-0 rounded opacity-50 from-purple-600 to-blue-500"></span>
                                <span wire:loading.remove
                                    class="absolute inset-0 w-full h-full transition-all duration-200 ease-out rounded shadow-xl bg-gradient-to-br filter group-active:opacity-0 group-hover:blur-sm from-purple-600 to-blue-500"></span>
                                <span wire:loading.remove
                                    class="absolute inset-0 w-full h-full transition duration-200 ease-out rounded bg-gradient-to-br to-purple-600 from-blue-500"></span>
                                <span wire:loading.remove class="relative">Load More</span>
                                <div wire:loading.delay wire:target="loadMore">
                                    <div role="status">
                                        <svg aria-hidden="true"
                                            class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                                fill="currentColor" />
                                            <path
                                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                                fill="currentFill" />
                                        </svg>
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </button>
                        </div>
                    @else
                        <div class="mx-auto w-full text-center justify-center">
                            <button disabled wire:click="loadMore"
                                class="opacity-50 px-5 py-2.5 relative rounded group font-medium text-white font-medium inline-block">
                                <span
                                    class="absolute top-0 left-0 w-full h-full rounded opacity-50 filter blur-sm bg-gradient-to-br from-teal-600 to-green-500"></span>
                                <span
                                    class="h-full w-full inset-0 absolute mt-0.5 ml-0.5 bg-gradient-to-br filter group-active:opacity-0 rounded opacity-50 from-teal-600 to-green-500"></span>
                                <span
                                    class="absolute inset-0 w-full h-full transition-all duration-200 ease-out rounded shadow-xl bg-gradient-to-br filter group-active:opacity-0 group-hover:blur-sm from-teal-600 to-green-500"></span>
                                <span
                                    class="absolute inset-0 w-full h-full transition duration-200 ease-out rounded bg-gradient-to-br to-teal-600 from-green-500"></span>
                                <span class="relative">No More</span>
                                <div wire:loading.delay wire:target="loadMore">
                                    <div role="status">
                                        <svg aria-hidden="true"
                                            class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                                fill="currentColor" />
                                            <path
                                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                                fill="currentFill" />
                                        </svg>
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </button>
                        </div>
                    @endif



                </div>
                <div class="relative w-full md:w-1/3">
                    <div class="relative min-h-[1px] h-full px-4">
                        <div class="sticky w-full top-0">
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
</div>
