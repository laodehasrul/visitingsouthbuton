@section('title', "Destinasi ". $category->title)
<div>
    <section>
        <div class="relative w-full h-auto">
            <div class="relative w-full bg-cover bg-center">
                <img class="w-full h-[400px] object-cover object-center"
                    src="{{ asset('storage/category') }}/{{ $category->image_featured }}" alt="">
                <div class="absolute z-10 w-full mx-auto bottom-0 pb-5 md:pb-10 mb-10 text-center">
                    <div class="flex flex-col items-center mx-auto text-center h-auto text-white">
                        <div class="uppercase text-3xl font-semibold lg:text-5xl px-10">
                            <h1>{{ $category->title }}</h1>
                        </div>
                        <div class="max-w-4xl pt-5 text-xl lg:text-2xl">
                            <h2>{{ $category->description }}</h2>
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
                    {{ $category->title }}
                </a>
            </div>
        </div>
        <div class="max-w-6xl px-6 xl:px-0 mx-auto my-10">
            <div class="relative w-full px-5 md:px-0 md:flex space-y-5 md:space-y-0 space-x-0 md:space-x-4">
                <div class="relative w-full">
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

                    <div wire:loading.class="invisible" wire:target="search"
                        class="flex flex-col items-start justify-start md:flex-row grid grid-cols-1 md:grid-cols-3 ">
                        @forelse ($wisata as $item)
                            <div class="group p-4 w-full">
                                <div
                                    class="flex flex-col transition duration-500 ease-in-out transform bg-white rounded-lg shadow-2xl hover:scale-105">
                                    <div class="relative">
                                        <a href="{{ route('detail-post', [$item->category->slug, $item->slug]) }}">
                                            <img class="h-56 w-full rounded-t-lg object-cover transform duration-200"
                                                alt="article image"
                                                src="{{ asset('storage/destinasi') }}/{{ $item->image_featured }}">
                                        </a>
                                        <div class="absolute w-full bottom-0 flex items-center justify-between">
                                            <div class="relative bottom-0 left-0 ml-[15px] mb-[10px]">
                                                <span
                                                    class="px-3 py-2 bg-teal-500 text-white text-[10px] font-bold uppercase">{{ $item->category->title }}</span>
                                            </div>
                                            <div
                                                class="absolute invisible group-hover:visible group-hover:mr-5 translate-x-10 opacity-0 group-hover:opacity-100 transform transition-all ease-in-out duration-500 group-hover:translate-x-0 bottom-0 right-0 items-center bg-white p-2 mr-2">
                                                <div class="flex items-center ">
                                                    @livewire('destinasi.vote', ['getdestination' => $item], key($item->id))
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-6 pt-4 mb-1 text-xl font-bold leading-4">
                                        <a href="{{ route('detail-post', [$item->category->slug, $item->slug]) }}">
                                            <span
                                                class="h-[40px] uppercase leading-relaxed text-sm font-bold group-hover:text-teal-600">{{ $item->name }}</span></a>

                                        <div class="flex items-center text-[10px] font-medium text-gray-500">
                                            <span class="mr-1 capitalize">{{ $item->user->name }} | </span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <span>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</span>
                                        </div>
                                    </div>
                                    <div class="px-6 pt-1">

                                        <div class="text-[12px] overflow-hidden h-20 ...">{!! \Illuminate\Support\Str::limit($item->description, 150) !!}
                                        </div>
                                    </div>

                                </div>

                            </div>
                        @empty
                            <div class="mt-2">Not Found Result</div>
                        @endforelse
                    </div>
                    @if (count($wisata) >= $amount)
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
            </div>
        </div>
    </section>
</div>
