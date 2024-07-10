<div>
    <section>
            <div class="relative w-full h-auto">
                <div class="relative w-full bg-cover bg-center">
                    <img class="w-full h-[400px] object-cover object-center"
                        src="{{ asset('images/background/background1.jpg') }}" alt="">
                    <div class="absolute z-10 w-full mx-auto bottom-0 pb-5 md:pb-10 mb-10 text-center">
                        <div class="flex flex-col items-center mx-auto text-center h-auto text-white">
                            <div class="uppercase text-3xl font-semibold lg:text-5xl px-10">
                                <h1>Video Galery</h1>
                            </div>
                            <div class="max-w-4xl pt-5 text-xl lg:text-2xl">
                                <h2>Kumpulan video unik tentang Buton Selatan</h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-200">
                <div
                    class="max-w-6xl px-6 xl:px-0 flex items-center py-4 mx-auto overflow-y-auto text-xs md:text-sm lg:text-md whitespace-nowrap">
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

                    <a href="#" class="text-teal-600 hover:underline capitalize">
                        Video Galery
                    </a>
                </div>
            </div>

        <div class="max-w-6xl px-6 xl:px-0 mx-auto my-10">
            <div class="relative w-full px-5 md:px-0 md:flex space-y-5 md:space-y-0 space-x-0 md:space-x-4">
                <div class="relative w-full space-y-8">
                    <div class="w-full flex justify-between items-center border border-solid p-4">
                        <div class="w-[60%] md:w-[80%] relative mr-4">
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
                    <div wire:loading.class="invisible" wire:target="search"
                        class="grid lg:grid-cols-3 2xl:grid-cols-3 grid-cols-1 gap-1">
                        @forelse ($videos as $video)
                            <div wire:key="{{ $video->id }}">
                                <button wire:click="showVideo({{ $video->id }})"
                                    class="relative group w-full mx-auto shadow-xl bg-cover bg-center transform duration-500 hover:-translate-y-2 cursor-pointer group">
                                    <x-embed class="w-full" url="{{ $video->url_video }}" aspect-ratio="16:9" />
                                    <div
                                        class="absolute rounded-md top-0 p-8 pt-24  w-full h-full bg-black bg-opacity-20 flex flex-wrap flex-col hover:bg-opacity-75 transform duration-300">
                                        <div
                                            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white opacity-0 group-hover:opacity-100 transition ease-in-out delay-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
                                            </svg>
                                        </div>
                                        <div class="absolute bottom-0 mb-4">

                                            <h1
                                                class="text-white text-md uppercase font-bold mb-2 transform duration-300">
                                                {{ $video->title }}
                                            </h1>
                                            <div class="flex space-x-2 items-center">
                                                <div
                                                    class="text-white text-xs py-0.5 px-1 flex bg-teal-500 transform duration-300">
                                                    <p>Video</p>
                                                </div>
                                                <p class="text-white text-xs">
                                                    {{ \Carbon\Carbon::parse($video->created_at)->format('d/m/Y') }}
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </button>
                            </div>
                        @empty
                            <div class="mt-2">Not Found Result</div>
                        @endforelse
                    </div>
                    @if (count($videos) >= $amount)
                        <div class="mx-auto w-full text-center justify-center">
                            <button wire:click="loadMore"
                                class="px-5 py-2.5 relative rounded group font-medium text-white font-medium inline-block">
                                <span
                                    class="absolute top-0 left-0 w-full h-full rounded opacity-50 filter blur-sm bg-gradient-to-br from-purple-600 to-blue-500"></span>
                                <span
                                    class="h-full w-full inset-0 absolute mt-0.5 ml-0.5 bg-gradient-to-br filter group-active:opacity-0 rounded opacity-50 from-purple-600 to-blue-500"></span>
                                <span
                                    class="absolute inset-0 w-full h-full transition-all duration-200 ease-out rounded shadow-xl bg-gradient-to-br filter group-active:opacity-0 group-hover:blur-sm from-purple-600 to-blue-500"></span>
                                <span
                                    class="absolute inset-0 w-full h-full transition duration-200 ease-out rounded bg-gradient-to-br to-purple-600 from-blue-500"></span>
                                <span class="relative">Load More</span>
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
                    @endif
                </div>
            </div>
        </div>
        @if ($isModalOpen)
            @include('components.video-modal')
        @endif
    </section>
    @push('styles')
        <style>
            .laravel-embed__responsive-wrapper {
                position: relative;
                height: 100%;
                overflow: hidden;
                max-width: 100%;
                min-height: 220px;
            }

            .laravel-embed__fallback {
                background: rgba(0, 0, 0, 0.15);
                color: rgba(0, 0, 0, 0.7);
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .laravel-embed__fallback,
            .laravel-embed__responsive-wrapper iframe,
            .laravel-embed__responsive-wrapper object,
            .laravel-embed__responsive-wrapper embed {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                border-radius: 10px
            }
        </style>
    @endpush
</div>
