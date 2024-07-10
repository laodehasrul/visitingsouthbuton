<div>
    <form>
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative mb-5">
            <div wire:target="query" class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg wire:loading.remove class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <div wire:loading.delay role="status">
                    <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
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
            <input type="search" id="default-search" wire:model="search"
                class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Pencarian..." required>
        </div>

    </form>
    @if (!empty($search))
        <div class="">
            <div class="h-auto flex w-full overflow-x-auto">
                @if ($berita_count !== 0)
                    <div x-data="{ open: true }" class="inline-flex relative">
                        <button @click="open = ! open"
                            class="mr-1 transform transition-all duration-500 bg-teal-600 w-6 flex justify-center items-center p-4 py-4 border-r-2">
                            <span class=" text-white font-extrabold text-md uppercase -tracking-[4px] font-poppins"
                                style="text-orientation: upright; writing-mode: vertical-rl;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-5 h-5 inline-flex -ml-2" x-transition
                                    :class="{
                                        'rotate-180 duration-300 transform transition-all': open,
                                        'rotate-0 duration-300 transform transition-all':
                                            !open
                                    }">
                                    <path fill-rule="evenodd"
                                        d="M13.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L11.69 12 4.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M19.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06L17.69 12l-6.97-6.97a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                        clip-rule="evenodd" />
                                </svg>Berita
                            </span>
                        </button>

                        <div x-cloak x-show="open" 
                            class="flex w-full relative bg-white space-x-2"
                            x-transition:enter="transition ease-in duration-100"
                            x-transition:enter-start="opacity-0 -translate-x-10"
                            x-transition:enter-end="opacity-100 translate-x-0"
                            x-transition:leave="transition ease-out duration-100"
                            x-transition:leave-start="opacity-100 translate-x-0"
                            x-transition:leave-end="opacity-0 -translate-x-10">
                            @foreach ($berita_search as $item)
                                <a href="{{ route('getberita', $item->slug) }}" class="group">
                                    <div class="cursor-pointer hover:bg-sky-100 w-[140px] group-hover:text-teal-600">
                                        <div>
                                            <img class="h-[80px] w-[140px] object-cover object-center"
                                                src="{{ asset('storage/berita') }}/{{ $item->image_featured }}"
                                                alt="">
                                        </div>
                                        <div class="leading-none">
                                            <h1 class="text-xs font-semibold leading-none">{{ $item->title }}</h1>
                                            <p class="text-[10px] text-gray-600 mt-0.5">{!! \Illuminate\Support\Str::limit($item->description, 100) !!}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if ($event_count !== 0)
                    <div x-data="{ open: true }" class="inline-flex relative">
                        <button @click="open = ! open"
                            class="mr-1 transform transition-all duration-500 bg-teal-600 w-6 flex justify-center items-center p-4 py-4 border-r-2">
                            <span class=" text-white font-extrabold text-md uppercase -tracking-[4px] font-poppins"
                                style="text-orientation: upright; writing-mode: vertical-rl;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-5 h-5 inline-flex -ml-2" x-transition
                                    :class="{
                                        'rotate-180 duration-300 transform transition-all': open,
                                        'rotate-0 duration-300 transform transition-all':
                                            !open
                                    }">
                                    <path fill-rule="evenodd"
                                        d="M13.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L11.69 12 4.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M19.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06L17.69 12l-6.97-6.97a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                        clip-rule="evenodd" />
                                </svg>Event
                            </span>
                        </button>

                        <div x-cloak x-show="open"
                            class="flex w-full relative bg-white space-x-2"
                            x-transition:enter="transition ease-in duration-100"
                            x-transition:enter-start="opacity-0 -translate-x-10"
                            x-transition:enter-end="opacity-100 translate-x-0"
                            x-transition:leave="transition ease-out duration-100"
                            x-transition:leave-start="opacity-100 translate-x-0"
                            x-transition:leave-end="opacity-0 -translate-x-10">
                            @foreach ($event_search as $item)
                                <a href="{{ route('detail-event', $item->slug) }}" class="group">
                                    <div class="cursor-pointer hover:bg-sky-100 w-[140px] group-hover:text-teal-600">
                                        <div>
                                            <img class="h-[80px] w-[140px] object-cover object-center"
                                                src="{{ asset('storage/event-festival') }}/{{ $item->image_featured }}"
                                                alt="">
                                        </div>
                                        <div class="leading-none">
                                            <h1 class="text-xs font-semibold leading-none">{{ $item->title }}</h1>
                                            <p class="text-[10px] text-gray-600 mt-0.5">{!! \Illuminate\Support\Str::limit($item->description, 100) !!}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if ($destinasi_count !== 0)
                    <div x-data="{ open: true }" class="inline-flex relative">
                        <button @click="open = ! open"
                            class="mr-1 transform transition-all duration-500 bg-teal-600 w-6 flex justify-center items-center p-4 py-4 border-r-2">
                            <span class=" text-white font-extrabold text-md uppercase -tracking-[4px] font-poppins"
                                style="text-orientation: upright; writing-mode: vertical-rl;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-5 h-5 inline-flex -ml-2" x-transition
                                    :class="{
                                        'rotate-180 duration-300 transform transition-all': open,
                                        'rotate-0 duration-300 transform transition-all':
                                            !open
                                    }">
                                    <path fill-rule="evenodd"
                                        d="M13.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L11.69 12 4.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M19.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06L17.69 12l-6.97-6.97a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                        clip-rule="evenodd" />
                                </svg>Wisata
                            </span>
                        </button>

                        <div x-cloak x-show="open" 
                            class="flex w-full relative bg-white space-x-2"
                            x-transition:enter="transition ease-in duration-100"
                            x-transition:enter-start="opacity-0 -translate-x-10"
                            x-transition:enter-end="opacity-100 translate-x-0"
                            x-transition:leave="transition ease-out duration-100"
                            x-transition:leave-start="opacity-100 translate-x-0"
                            x-transition:leave-end="opacity-0 -translate-x-10">
                            @foreach ($destinasi_search as $item)
                                <a href="{{ route('detail-post', [$item->category->slug, $item->slug]) }}"
                                    class="group">
                                    <div class="cursor-pointer hover:bg-sky-100 w-[140px] group-hover:text-teal-600">
                                        <div>
                                            <img class="h-[80px] w-[140px] object-cover object-center"
                                                src="{{ asset('storage/destinasi') }}/{{ $item->image_featured }}"
                                                alt="">
                                        </div>
                                        <div class="leading-none">
                                            <h1 class="text-xs font-semibold leading-none">{{ $item->name }}</h1>
                                            <p class="text-[10px] text-gray-600 mt-0.5">{!! \Illuminate\Support\Str::limit($item->description, 100) !!}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
