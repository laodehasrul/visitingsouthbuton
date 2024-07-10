<div class="fixed z-50 inset-0 ease-out duration-400">
    <div class="flex items-end justify-center pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute h-full inset-0 bg-gray-500 opacity-75"></div>
            <div class="relative overflow-auto dark:bg-gray-800 inline-block align-bottom bg-white rounded-lg text-left shadow-xl transform transition-all sm:my-10 sm:align-middle sm:max-w-4xl sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="p-5 mx-auto text-gray-900 dark:text-white text-lg uppercase w-full border-b text-center">
                    @if ($isEditMode)
                        Update Kategori
                    @else
                        Tambah Kategori
                    @endif
                </div>
                <form class="">
                    <div class="p-8">
                        <div class="flex relative z-0 w-full mb-4 group space-x-4">
                            <div class="flex-1 relative">
                                <input wire:model="title" wire:keyup='generateSlug' type="text" name="title"
                                    id="title"
                                    class="block py-2.5 px-2 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-white focus:outline-none focus:ring-0 focus:border-teal-500 peer"
                                    placeholder=" " required />
                                <label for="title"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-500 peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                                    Kategori</label>
                                @error('title')
                                    <span class="text-red-500 dark:text-white">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex-1 relative">
                                <input wire:model="slug" type="text" name="slug" id="slug"
                                    class="block py-2.5 px-2 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-white focus:outline-none focus:ring-0 focus:border-teal-500 peer"
                                    placeholder=" " required />
                                <label for="slug"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-500 peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Slug</label>
                                @error('slug')
                                    <span class="text-red-500 dark:text-white">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="relative z-0 w-full mb-4 group lg:flex items-start lg:space-x-5">
                            <div class="w-full lg:w-2/3 mb-4">
                                <div class="mb-4">
                                    <label for="countries"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                                        Parent Kategori<span class="text-gray-500 capitalize">(Opsional)</span></label>
                                    <select id="countries" wire:model="parent_id" name="parent_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>None</option>
                                        @if ($categories)
                                            @foreach ($categories as $category)
                                                <?php $dash = ''; ?>
                                                <option value="{{ $category->id }}"
                                                    @if ($category->parent_id == $category->id) selected @endif>
                                                    {{ $category->title }}</option>
                                                @if (count($category->childrens))
                                                    @include('livewire.admin.destinasi.kategori.child', [
                                                        'subcategories' => $category->childrens,
                                                    ])
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div>
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                                    <textarea wire:model="description" id="description" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-white dark:focus:ring-white dark:focus:border-white"
                                        placeholder="Deskripsi..."></textarea>
                                    @error('description')
                                        <span class="text-red-500 dark:text-white">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full lg:w-1/3">
                                <label for="message"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image
                                    Featured</label>
                                <div>
                                    @if ($isEditMode)
                                        @if ($newimage)
                                            <label style="background-image: url('{{ $newimage->temporaryUrl() }}')"
                                                class="relative group bg-no-repeat bg-center bg-contain flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                <div
                                                    class="flex flex-col items-center justify-center pt-5 pb-6 hover:text-white">
                                                    <svg class="w-8 h-8 mb-4 text-gray-100 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                    </svg>
                                                </div>
                                            </label>
                                        @else
                                            <label
                                                style="background-image: url('{{ asset('storage/category') }}/{{ $oldimage }}')"
                                                class="bg-no-repeat bg-center bg-contain relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                    </svg>
                                                </div>
                                            </label>
                                        @endif
                                    @else
                                    @endif

                                    @if ($isEditMode)
                                        <x-filepond wire:model="newimage" allowFileTypeValidation
                                            acceptedFileTypes="['image/png', 'image/jpg', 'image/JPG', 'image/jpeg']"
                                            allowFileSizeValidation maxFileSize="4mb" />
                                        @error('newimage')
                                            <span class="text-xs text-red-500 dark:text-white">{{ $message }}</span>
                                        @enderror
                                    @else
                                        <x-filepond wire:model="newimage" allowImagePreview imagePreviewMaxHeight="200"
                                            allowFileTypeValidation
                                            acceptedFileTypes="['image/png', 'image/jpg', 'image/JPG', 'image/jpeg']"
                                            allowFileSizeValidation maxFileSize="4mb" />
                                        @error('newimage')
                                            <span class="text-xs text-red-500 dark:text-white">{{ $message }}</span>
                                        @enderror
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-800 px-4 py-3 sm:px-6 flex justify-end space-x-3 border-t">
                        <span class="flex rounded-md shadow-sm sm:mt-0 sm:w-auto">
                            <button wire:click="closeModalPopover()" type="button"
                                class="relative inline-flex items-center justify-center p-2 px-4 py-2 overflow-hidden font-medium dark:bg-red-500 text-indigo-600 transition duration-300 ease-out border-2 border-red-500 rounded-lg shadow-md group">
                                <span
                                    class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-y-full bg-red-500 group-hover:translate-y-0 ease">
                                    <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </span>
                                <span
                                    class="absolute flex items-center justify-center w-full h-full text-red-500 dark:text-white transition-all duration-300 transform group-hover:translate-y-full ease">Batal</span>
                                <span class="relative invisible">Batal</span>
                            </button>
                        </span>
                        <span class="flex rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            @if ($isEditMode)
                                <button wire:click.prevent="updateData()" type="button"
                                    class="relative inline-flex items-center justify-center p-2 px-4 py-2 overflow-hidden font-medium dark:bg-teal-500 text-indigo-600 transition duration-300 ease-out border-2 border-teal-500 rounded-lg shadow-md group">
                                    <span
                                        class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-y-full bg-teal-500 group-hover:translate-y-0 ease">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </span>
                                    <span
                                        class="absolute flex items-center justify-center w-full h-full text-teal-500 dark:text-white transition-all duration-300 transform group-hover:translate-y-full ease">Update</span>
                                    <span class="relative invisible">Update</span>
                                </button>
                            @else
                                <button wire:click.prevent="submit()" type="button"
                                    class="relative inline-flex items-center justify-center p-2 px-4 py-2 overflow-hidden font-medium dark:bg-teal-500 text-indigo-600 transition duration-300 ease-out border-2 border-teal-500 rounded-lg shadow-md group">
                                    <span
                                        class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-y-full bg-teal-500 group-hover:translate-y-0 ease">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </span>
                                    <span
                                        class="absolute flex items-center justify-center w-full h-full text-teal-500 dark:text-white transition-all duration-300 transform group-hover:translate-y-full ease">Simpan</span>
                                    <span class="relative invisible">Simpan</span>
                                </button>
                            @endif
                        </span>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
