<div class="mt-5 p-5 shadow-xl rounded-md dark:bg-gray-800 dark:shadow-md dark:shadow-white">
    <div
        class="pb-2 flex w-full mx-auto text-center justify-center border-b-2 border-solid border-teal-500 dark:border-white">
        <h1 class="uppercase font-semibold text-xl dark:text-white">Edit Data Video</h1>
    </div>

    <div class="mt-5">
        <form>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input wire:model="title" wire:keyup='generateSlug' type="text" name="title" id="floating_title"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-white focus:outline-none focus:ring-0 focus:border-teal-500 peer"
                        placeholder=" " required />
                    <label for="floating_title"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-500 peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Judul
                        Video</label>
                    @error('title') <span class="text-xs text-red-500 dark:text-white">{{ $message }}</span> @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input wire:model="slug" type="text" name="slug" id="floating_slug"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-white focus:outline-none focus:ring-0 focus:border-teal-500 peer"
                        placeholder=" " required />
                    <label for="floating_slug"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-500 peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Slug</label>
                    @error('slug') <span class="text-xs text-red-500 dark:text-white">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-5">
                <div class="relative w-full mb-6 col-span-3 md:col-span-2">
                    <label for="message"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                    <textarea wire:model="description" name="description" id="description" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-white dark:focus:border-white"
                        placeholder="Deskripsi..."></textarea>
                    @error('description') <span class="text-xs text-red-500 dark:text-white">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label class="col-sm-2 control-label dark:text-white font-semibold" for=" ">URL Video </label>
                <div class="relative z-0 w-full mb-6 group">
                    <input wire:model="url_video" type="text" name="url_video" 
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-white focus:outline-none focus:ring-0 focus:border-teal-500 peer"
                        placeholder="https://youtu.be/abc###" required />
                    @error('url_video') <span class="text-xs text-red-500 dark:text-white">{{ $message }}</span> @enderror
                </div>
            </div>
            @if ($url_video)
            <style>
                .laravel-embed__responsive-wrapper { position: relative; height: 100%; overflow: hidden; max-width: 100%;  } 
                .laravel-embed__fallback { background: rgba(0, 0, 0, 0.15); color: rgba(0, 0, 0, 0.7); display: flex; align-items: center; justify-content: center; } 
                .laravel-embed__fallback,
                .laravel-embed__responsive-wrapper iframe,
                .laravel-embed__responsive-wrapper object,
                .laravel-embed__responsive-wrapper embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border-radius: 10px}
            </style>
            <x-embed class="w-full h-56" url="{{$url_video}}" aspect-ratio="16:9"/>
            @endif
            <div class="flex w-full justify-end space-x-3 mt-5">
                <span class="flex rounded-md shadow-sm sm:mt-0 sm:w-auto">
                    <button wire:click.prevent="back()" type="button"
                        class="relative inline-flex items-center justify-center p-2 px-4 py-2 overflow-hidden font-medium dark:bg-red-500 text-indigo-600 transition duration-300 ease-out border-2 border-red-500 rounded-lg shadow-md group">
                        <span
                            class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-y-full bg-red-500 group-hover:translate-y-0 ease">
                            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
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
                    <button wire:click.prevent="submit()" type="button"
                        class="relative inline-flex items-center justify-center p-2 px-4 py-2 overflow-hidden font-medium dark:bg-teal-500 text-indigo-600 transition duration-300 ease-out border-2 border-teal-500 rounded-lg shadow-md group">
                        <span
                            class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-y-full bg-teal-500 group-hover:translate-y-0 ease">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </span>
                        <span
                            class="absolute flex items-center justify-center w-full h-full text-teal-500 dark:text-white transition-all duration-300 transform group-hover:translate-y-full ease">Simpan</span>
                        <span class="relative invisible">Simpan</span>
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>