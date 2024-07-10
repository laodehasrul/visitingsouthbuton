<div>
    <div class="mb-5">
        @guest
            <form wire:submit.prevent="storecomment">
                <label for="chat" class="sr-only">Komentar</label>
                <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                    <textarea id="chat" wire:model="body" rows="1"
                        class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Tulis Komentar..."></textarea>
                    <button type="submit"
                        class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                        <svg class="w-5 h-5 rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 20">
                            <path
                                d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                        </svg>
                        <span class="sr-only">Kirim Komentar</span>
                    </button>
                </div>
            </form>
        @endguest
        @auth
        
            <form wire:submit.prevent="storecomment">
                @error('body')
                    <div class="p-2 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        Silahkan tulis komentar.
                    </div>
                @enderror
                <label for="chat" class="sr-only">Komentar</label>
                <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                    <textarea id="chat" wire:model="body" rows="1"
                        class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Tulis Komentar..."></textarea>
                    <button type="submit"
                        class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                        <svg class="w-5 h-5 rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 20">
                            <path
                                d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                        </svg>
                        <span class="sr-only">Kirim Komentar</span>
                    </button>
                </div>
                
            </form>
        @endauth
    </div>


    @foreach ($comments as $item)
        <div class="w-full border-b border-solid mb-5 pb-3" id="comment-{{ $item->id }}">
            <div>
                <div class="flex justify-between items-center font-mono">
                    <div class="flex items-center space-x-3">
                        <img class="rounded-full h-8 w-8"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ2pg1HFuBFqOw0e3jEo_EOxaE-clhvda8yICVh4jMQow&s"
                            alt="">
                        <h1 class="capitalize text-md ">{{ $item->user->name }}</h1>
                        <p class="text-xs text-gray-500">{{ $item->created_at->diffForHumans() }}</p>
                    </div>
                    <div>
                        @auth
                            @if ($item->user_id == Auth::user()->id || Auth::user()->hasRole('admin'))
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
                                        <button wire:click="commentEdit({{ $item->id }})"
                                            x-on:click="open = !open">Edit</button>
                                        <button wire:click="deletecomment({{ $item->id }})"
                                            x-on:click="open = !open">Hapus</button>
                                    </ul>
                                </div>
                            @endif
                        @endauth

                    </div>
                </div>
                <div class="w-full mt-2 max-w-2xl">
                    {{ $item->body }}
                </div>
                @auth
                    <div class="flex items-center space-x-3 mt-2 text-sm text-gray-600 font-mono">
                        @if (isset($item->hasLike))
                            <button wire:click="like({{ $item->id }})"
                                class="flex space-x-2 items-center hover:text-gray-900">
                                <svg class="w-4 h-4 text-pink-600 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path
                                        d="M17.947 2.053a5.209 5.209 0 0 0-3.793-1.53A6.414 6.414 0 0 0 10 2.311 6.482 6.482 0 0 0 5.824.5a5.2 5.2 0 0 0-3.8 1.521c-1.915 1.916-2.315 5.392.625 8.333l7 7a.5.5 0 0 0 .708 0l7-7a6.6 6.6 0 0 0 2.123-4.508 5.179 5.179 0 0 0-1.533-3.793Z" />
                                </svg>
                                <p>{{ $item->totalLikes() }}</p>
                            </button>
                        @else
                            <button wire:click="like({{ $item->id }})"
                                class="flex space-x-2 items-center hover:text-gray-900">
                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path
                                        d="M17.947 2.053a5.209 5.209 0 0 0-3.793-1.53A6.414 6.414 0 0 0 10 2.311 6.482 6.482 0 0 0 5.824.5a5.2 5.2 0 0 0-3.8 1.521c-1.915 1.916-2.315 5.392.625 8.333l7 7a.5.5 0 0 0 .708 0l7-7a6.6 6.6 0 0 0 2.123-4.508 5.179 5.179 0 0 0-1.533-3.793Z" />
                                </svg>
                                <p>{{ $item->totalLikes() }}</p>
                            </button>
                        @endif
                        <button wire:click="selectReply({{ $item->id }})"
                            class="flex items-center space-x-2 hover:text-gray-900">
                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.5 6.5h.01m4.49 0h.01m4.49 0h.01M18 1H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                            </svg>
                            <p>Balas</p>
                        </button>
                    </div>
                @endauth
                @if (isset($comment_id) && $comment_id == $item->id)
                    <form wire:submit.prevent="replycomment">
                        <label for="chat2" class="sr-only">Balas Komentar</label>
                        <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                            <textarea id="chat2" wire:model="body2" rows="1"
                                class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Balas Komentar..."></textarea>
                            <button type="submit"
                                class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                <svg class="w-5 h-5 rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 18 20">
                                    <path
                                        d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                                </svg>
                                <span class="sr-only">Balas</span>
                            </button>
                        </div>
                    </form>
                @endif
                @if (isset($edit_comment_id) && $edit_comment_id == $item->id)
                    <form wire:submit.prevent="changecomment">
                        <label for="chat2" class="sr-only">Update Komentar</label>
                        <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                            <textarea id="chat2" wire:model="body2" rows="1"
                                class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Update Komentar..."></textarea>
                            <button type="submit"
                                class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                <svg class="w-5 h-5 rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 18 20">
                                    <path
                                        d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                                </svg>
                                <span class="sr-only">Update Komentar</span>
                            </button>
                        </div>
                    </form>
                @endif
            </div>
            <div>
            </div>
            @if ($item->childrens->count())
                <div class="flex items-center">
                    <button type="button" wire:loading.delay.shortest wire:click="$toggle('hasReplies')"
                        class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                        @if (!$hasReplies)
                            View all Replies ({{ $item->childrens->count() }})
                        @else
                            Hide Replies
                        @endif
                    </button>
                    <div class="hidden" wire:loading.delay.shortest wire:target="$toggle('hasReplies')">
                        <svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-white animate-spin"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="#E5E7EB" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentColor" />
                        </svg>
                    </div>
                </div>
            @endif
            @if ($item->childrens)
                @foreach ($item->childrens as $item2)
                    <div class="relative w-full flex justify-end">
                        <div class="w-full max-w-[95%] border-t border-solid mt-3 pt-4">
                            <div class="flex justify-between items-center font-mono">
                                <div class="flex items-center space-x-3">
                                    <img class="rounded-full h-8 w-8"
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ2pg1HFuBFqOw0e3jEo_EOxaE-clhvda8yICVh4jMQow&s"
                                        alt="">
                                    <h1 class="capitalize text-md ">{{ $item2->user->name }}</h1>
                                    <p class="text-xs text-gray-500">{{ $item2->created_at->diffForHumans() }}</p>
                                </div>
                                <div>
                                    @auth
                                        @if ($item2->user_id == Auth::user()->id || Auth::user()->hasRole('admin'))
                                            <div class="relative" x-data="{ open: false }"
                                                x-on:click.outside="open = false">
                                                <button class="p-2 rounded-full bg-gray-100 hover:bg-gray-200"
                                                    x-on:click="open = !open"><svg
                                                        class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 16 3">
                                                        <path
                                                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                                    </svg>
                                                </button>
                                                <ul class="absolute mt-1 bg-white rounded-md shadow-lg p-3 right-0"
                                                    x-show="open" x-transition.opacity>
                                                    <button wire:click="commentEdit({{ $item2->id }})"
                                                        x-on:click="open = !open">Edit</button>
                                                    <button wire:click="deletecomment({{ $item2->id }})"
                                                        x-on:click="open = !open">Hapus</button>
                                                </ul>
                                            </div>
                                        @endif
                                    @endauth

                                </div>
                            </div>
                            <div class="w-[95%] mt-2">
                                {{ $item2->body }}
                            </div>
                            @auth
                                <div class="flex items-center space-x-3 mt-2 text-sm text-gray-600 font-mono">
                                    @if (isset($item2->hasLike))
                                        <button wire:click="like({{ $item2->id }})"
                                            class="flex space-x-2 items-center hover:text-gray-900">
                                            <svg class="w-4 h-4 text-pink-600 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 18">
                                                <path
                                                    d="M17.947 2.053a5.209 5.209 0 0 0-3.793-1.53A6.414 6.414 0 0 0 10 2.311 6.482 6.482 0 0 0 5.824.5a5.2 5.2 0 0 0-3.8 1.521c-1.915 1.916-2.315 5.392.625 8.333l7 7a.5.5 0 0 0 .708 0l7-7a6.6 6.6 0 0 0 2.123-4.508 5.179 5.179 0 0 0-1.533-3.793Z" />
                                            </svg>
                                            <p>{{ $item2->totalLikes() }}</p>
                                        </button>
                                    @else
                                        <button wire:click="like({{ $item2->id }})"
                                            class="flex space-x-2 items-center hover:text-gray-900">
                                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 18">
                                                <path
                                                    d="M17.947 2.053a5.209 5.209 0 0 0-3.793-1.53A6.414 6.414 0 0 0 10 2.311 6.482 6.482 0 0 0 5.824.5a5.2 5.2 0 0 0-3.8 1.521c-1.915 1.916-2.315 5.392.625 8.333l7 7a.5.5 0 0 0 .708 0l7-7a6.6 6.6 0 0 0 2.123-4.508 5.179 5.179 0 0 0-1.533-3.793Z" />
                                            </svg>
                                            <p>{{ $item2->totalLikes() }}</p>
                                        </button>
                                    @endif
                                    <button wire:click="selectReply({{ $item2->id }})"
                                        class="flex items-center space-x-2 hover:text-gray-900">
                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5.5 6.5h.01m4.49 0h.01m4.49 0h.01M18 1H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                        </svg>
                                        <p>Balas</p>
                                    </button>
                                </div>
                            @endauth
                        </div>

                    </div>
                    @if (isset($comment_id) && $comment_id == $item2->id)
                        <form wire:submit.prevent="replycomment">
                            <label for="chat2" class="sr-only">Balas Komentar</label>
                            <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                                <textarea id="chat2" wire:model="body2" rows="1"
                                    class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Balas Komentar..."></textarea>
                                <button type="submit"
                                    class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5 rotate-90" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                        <path
                                            d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                                    </svg>
                                    <span class="sr-only">Balas</span>
                                </button>
                            </div>
                        </form>
                    @endif
                    @if (isset($edit_comment_id) && $edit_comment_id == $item2->id)
                        <form wire:submit.prevent="changecomment">
                            <label for="chat2" class="sr-only">Update Komentar</label>
                            <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                                <textarea id="chat2" wire:model="body2" rows="1"
                                    class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Update Komentar..."></textarea>
                                <button type="submit"
                                    class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5 rotate-90" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                        <path
                                            d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                                    </svg>
                                    <span class="sr-only">Update Komentar</span>
                                </button>
                            </div>
                        </form>
                    @endif
                @endforeach
            @endif

        </div>
    @endforeach
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</div>
