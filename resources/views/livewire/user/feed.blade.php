<div class="">
    @push('styles')
        <style>
            .zigzag {
                height: 16px;
                background: linear-gradient(45deg, white 25%, transparent 25%) -16px 0,
                    linear-gradient(-45deg, white 25%, transparent 25%) -16px 0,
                    linear-gradient(135deg, white 25%, transparent 25%),
                    linear-gradient(-135deg, white 25%, transparent 25%);
                background-position: -8px 0, -8px 0, 0 0, 0 0;
                background-size: 16px 16px;
            }
        </style>
    @endpush
    @section('title', "User Story")
    <!-- component -->
    <div class="max-w-5xl mx-auto py-14 md:py-10">
        <div class="w-full border rounded-lg p-5 bg-white shadow-xl">
            <div class="justify-between flex items-center">
                <div class="flex items-start space-x-5">
                    <div class="relative">
                        <img class="rounded-full w-[80px] h-[80px] shadow-md" src="{{ auth()->user()->avatarUrl() }}"
                            alt="">

                    </div>
                    <div class="space-y-2">
                        <h3 class="text-xl font-bold capitalize">{{ auth()->user()->name }}</h3>
                        <p>{{ auth()->user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full border rounded-lg p-5 bg-white shadow-xl mt-4">
            <div class="text-3xl text-center items-center font-bold">
                <span>Feed Story</span>
                <div class="mt-3 flex justify-center mx-auto bg-teal-500 w-[80px] zigzag">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 my-6 px-4 md:px-6 lg:px-8">

                @foreach ($allfeed as $item)
                    <div class="max-w-xl mx-auto px-4 py-4 bg-white shadow-md rounded-lg">
                        <div class="py-2 flex flex-row items-center justify-between">

                            <div class="flex flex-row items-center">
                                <p class="text-xs font-semibold text-gray-500">{{ $item->created_at->diffForHumans() }}</p>
                            </div>
                            <div>
                                <div class="relative" x-data="{ open: false }" x-on:click.outside="open = false">
                                    <button class="p-2 rounded-full bg-gray-100 hover:bg-gray-200"
                                        x-on:click="open = !open"><svg class="w-4 h-4 text-gray-800 dark:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 16 3">
                                            <path
                                                d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                        </svg>
                                    </button>
                                    <ul class="absolute mt-1 bg-white rounded-md shadow-lg p-3 right-0" x-show="open"
                                        x-transition.opacity>
                                        <a href="{{ route('user.feed.edit', [auth()->user()->name, auth()->user()->id, $item->id]) }}" x-on:click="open = !open">Edit</a>
                                        <button wire:click="deleteConfirm({{ $item->id }})" x-on:click="open = !open">Hapus</button>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <img class="object-cover w-full rounded-lg h-52"
                                src="{{ asset('storage/story') }}/{{ $item->story_image }}"
                                alt="">
                        </div>
                        <div class="py-2">
                            <p class="leading-snug text-xs text-gray-700">{{ $item->description }}</p>
                        </div>
                    </div>
                @endforeach
                

            </div>
            <div class="flex mx-auto w-full mt-3">
                @if (count($allfeed) >= $amount)
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


</div>
