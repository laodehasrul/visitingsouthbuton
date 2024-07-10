<div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="bg-gray-50 dark:bg-gray-800 inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="p-5 mx-auto text-gray-900 dark:text-white text-lg uppercase w-full border-b text-center">
                @if ($isEditMode)
                    Update Dokumen
                @else
                    Tambah Dokumen
                @endif
            </div>
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Nama
                                Dokumen</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="title" placeholder="Nama Dokumen." wire:model="title">
                            @error('title')
                                <span class="text-xs text-red-500 dark:text-white">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">

                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                            <textarea id="description" rows="4" wire:model="description"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 d dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Keterangan..."></textarea>

                            @error('description')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <div class="mb-4">
                                <label for="oldfile"
                                    class="block mb-2 text-md font-medium text-gray-900 dark:text-white">File</label>
                                @if ($isEditMode)
                                    @if ($file)
                                    @else
                                        <input id="oldfile" name="oldfile"
                                            class="w-full rounded-sm bg-gray-100 text-sm cursor-not-allowed"
                                            type="text" value="{{ $oldfile }}" disabled>
                                    @endif
                                @else
                                @endif
                            </div>

                            <x-filepond wire:model="file" allowFileTypeValidation
                                acceptedFileTypes="['image/png', 'image/jpg', 'image/JPG', 'image/jpeg', 'application/vnd.openxmlformats-/.docx', 'application/pdf','application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel']"
                                allowFileSizeValidation maxFileSize="4mb" />
                            @error('file')
                                <span class="text-xs text-red-500 dark:text-white">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 flex justify-end space-x-3">
                    <span class="flex rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModalPopover()" type="button"
                            class="relative inline-flex items-center justify-center p-2 px-4 py-2 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out border-2 border-red-500 rounded-lg shadow-md group">
                            <span
                                class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-y-full bg-red-500 group-hover:translate-y-0 ease">
                                <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </span>
                            <span
                                class="absolute flex items-center justify-center w-full h-full text-red-500 transition-all duration-300 transform group-hover:translate-y-full ease">Batal</span>
                            <span class="relative invisible">Batal</span>
                        </button>
                    </span>
                    <span class="flex rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        @if ($isEditMode)
                            <button wire:click.prevent="updateData()" type="button"
                                class="relative inline-flex items-center justify-center p-2 px-4 py-2 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out border-2 border-teal-500 rounded-lg shadow-md group">
                                <span
                                    class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-y-full bg-teal-500 group-hover:translate-y-0 ease">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </span>
                                <span
                                    class="absolute flex items-center justify-center w-full h-full text-teal-500 transition-all duration-300 transform group-hover:translate-y-full ease">Update</span>
                                <span class="relative invisible">Update</span>
                            </button>
                        @else
                            <button wire:click.prevent="submit()" type="button"
                                class="relative inline-flex items-center justify-center p-2 px-4 py-2 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out border-2 border-teal-500 rounded-lg shadow-md group">
                                <span
                                    class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-y-full bg-teal-500 group-hover:translate-y-0 ease">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </span>
                                <span
                                    class="absolute flex items-center justify-center w-full h-full text-teal-500 transition-all duration-300 transform group-hover:translate-y-full ease">Simpan</span>
                                <span class="relative invisible">Simpan</span>
                            </button>
                        @endif
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
