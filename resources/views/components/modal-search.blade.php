<div
    x-data = "{show : false}"
    x-show = "show"
    x-on:open-modal.window = "show = true"
    x-on:close-modal.window = "show = false"
    x-on:keydown.escape.window = "show = true"
    x-transition:enter="transition origin-top ease-out duration-300"
    x-transition:enter-start="transform -translate-y-full opacity-0"
    x-transition:enter-end="transform translate-y-0 opacity-100"
    x-transition:leave="transition origin-bottom ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform -translate-y-full"
    class="fixed z-50 inset-0">
    <div x-on:click="show = false" class="fixed inset-0">
    </div>
    <div class="relative bg-white p-5 rounded m-auto fixed items-center justify-center mx-auto w-full max-w-6xl h-auto mt-2">
        <div class="flex mb-5 justify-center ">
            <button x-on:click="$dispatch('close-modal')" class="text-gray-500 hover:bg-white hover:border-black hover:rounded-full hover:border hover:p-2 hover:text-black transition-all duration-300 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l7.5-7.5 7.5 7.5m-15 6l7.5-7.5 7.5 7.5" />
                  </svg>
            </button>
        </div>
        @livewire('searchdata')
    </div>

</div>
