<div>
    <div class="flex items-center">
        <button wire:click="toggleLike()" class="flex space-x-2 items-center text-gray-400 hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-6 h-6 {{ Auth::user()?->hasEventVoted($getevent) ? 'text-red-400 hover:text-gray-400' : '' }}">
                <path
                    d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
            </svg>
        </button>
        <span class="font-semibold text-gray-400 text-xs ml-1">{{ $getevent->eventvote()->count() }}</span>
    </div>
</div>
