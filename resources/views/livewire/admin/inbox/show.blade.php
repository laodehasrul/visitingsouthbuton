<div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="bg-gray-50 dark:bg-gray-800 inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="p-5 mx-auto text-gray-900 dark:text-white text-lg uppercase w-full border-b text-center">
                Pesan
            </div>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 border-b-2">
                <div class="">
                    <div class="mb-2">
                        <h2 class="text-md font-bold">{{ $fullname }}</h2>
                        <p class="text-sm text-gray-500">{{ $email }}</p>
                    </div>
                    <div class="p-2 border rounded-md">
                        <h1 class="capitalize font-semibold text-lg mb-2 border-b">{{ $subject }}</h1>
                        <p class="text-md text-gray-700 normal-case">{{ $message }}</p>
                    </div>
                    <div class="p-2">
                        <span class="text-xs text-gray-500">
                            Tanggal pengirim : {{ \Carbon\Carbon::parse($data_post->created_at->toDateTimeString())->translatedFormat('l, d F Y') }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 flex justify-end space-x-3">
                <span class="flex rounded-md shadow-sm sm:mt-0 sm:w-auto">
                    <button wire:click="closeModalPopover()" type="button"
                        class="relative inline-flex items-center justify-center p-2 px-4 py-2 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out border-2 border-red-500 rounded-lg shadow-md group">
                        <span
                            class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-y-full bg-red-500 group-hover:translate-y-0 ease">
                            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </span>
                        <span
                            class="absolute flex items-center justify-center w-full h-full text-red-500 transition-all duration-300 transform group-hover:translate-y-full ease">Tutup</span>
                        <span class="relative invisible">Tutup</span>
                    </button>
                </span>
            </div>

        </div>
    </div>
</div>
