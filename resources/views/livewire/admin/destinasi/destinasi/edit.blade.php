@section('title', "Admin Destinasi Management")
<div class="mt-5 p-5 shadow-xl rounded-md dark:bg-gray-800 dark:shadow-md dark:shadow-white">
    <div
        class="pb-2 flex w-full mx-auto text-center justify-center border-b-2 border-solid border-teal-500 dark:border-white">
        <h1 class="uppercase font-semibold text-xl dark:text-white">Tambah Data Destinasi</h1>
    </div>
    <div class="mt-5">
        <form>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input wire:model="name" wire:keyup='generateSlug' type="text" name="name" id="floating_name"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-white focus:outline-none focus:ring-0 focus:border-teal-500 peer"
                        placeholder=" " required />
                    <label for="floating_name"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-500 peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama</label>
                    @error('name')
                        <span class="text-xs text-red-500 dark:text-white">{{ $message }}</span>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input wire:model="slug" type="text" name="slug" id="floating_slug"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-white focus:outline-none focus:ring-0 focus:border-teal-500 peer"
                        placeholder=" " required />
                    <label for="floating_slug"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-500 peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Slug</label>
                    @error('slug')
                        <span class="text-xs text-red-500 dark:text-white">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="relative w-full mb-5">
                <label for="message"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <textarea wire:model="description" name="description" id="description" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-white dark:focus:border-white"
                    placeholder="Deskripsi..."></textarea>
                @error('description')
                    <span class="text-xs text-red-500 dark:text-white">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                    Kategori</label>
                <select id="countries" wire:model="category" name="category"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>None</option>
                    @if ($categories)
                        @foreach ($categories as $category)
                            <?php $dash = ''; ?>
                            <option value="{{ $category->id }}" @if ($category->parent_id == $category->id) selected @endif>
                                {{ $category->title }}</option>
                            @if (count($category->childrens))
                                @include('livewire.admin.destinasi.kategori.child', [
                                    'subcategories' => $category->childrens,
                                ])
                            @endif
                        @endforeach
                    @endif
                </select>
                @error('category')
                    <span class="text-xs text-red-500 dark:text-white">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative w-full mb-5">
                <label for="message"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <input wire:model="address" type="text" name="address" id="address"
                            class="map-input block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-white focus:outline-none focus:ring-0 focus:border-teal-500 peer"
                            placeholder=" " required />
                        <label for="floating_name"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-500 peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat</label>
                        @error('address')
                            <span class="text-xs text-red-500 dark:text-white">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <div class="relative z-0 w-full mb-6 group">
                            <input wire:model="latitude" type="text" name="latitude" id="address-latitude"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-white focus:outline-none focus:ring-0 focus:border-teal-500 peer"
                                placeholder=" " required />
                            <label for="floating_slug"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-500 peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Latitude</label>
                            @error('latitude')
                                <span class="text-xs text-red-500 dark:text-white">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input wire:model="longitude" type="text" name="longitude" id="address-longitude"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-white focus:outline-none focus:ring-0 focus:border-teal-500 peer"
                                placeholder=" " required />
                            <label for="floating_slug"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-500 peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Longitude</label>
                            @error('longitude')
                                <span class="text-xs text-red-500 dark:text-white">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>
                <div id="address-map-container" class="mb-2" style="width:100%;height:400px; ">
                    <div style="width: 100%; height: 100%" id="address-map"></div>
                </div>
            </div>
            <div class="w-full lg:flex items-start mb-5 lg:space-x-5">
                <div class="w-full lg:w-1/3">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image
                        Featured</label>
                    <div class="flex items-center justify-center w-full">
                        @if ($newimage)
                            <label style="background-image: url('{{ $newimage->temporaryUrl() }}')"
                                class="relative group bg-no-repeat bg-center bg-contain flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6 hover:text-white">
                                    <svg class="w-8 h-8 mb-4 text-gray-100 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                </div>
                            </label>
                        @else
                            <label
                                style="background-image: url('{{ asset('storage/destinasi') }}/{{ $oldimage }}')"
                                class="bg-no-repeat bg-center bg-contain relative flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                </div>
                            </label>
                        @endif
                    </div>
                    <div>
                        <x-filepond wire:model="newimage" allowFileTypeValidation
                            acceptedFileTypes="['image/png', 'image/jpg', 'image/JPG', 'image/jpeg']"
                            allowFileSizeValidation maxFileSize="4mb" />
                        @error('newimage')
                            <span class="text-xs text-red-500 dark:text-white">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="w-full lg:w-2/3">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image
                        Galery</label>
                    <div class="flex items-center justify-center w-full">
                        <label
                            class="relative overflow-y-auto group bg-no-repeat bg-center bg-contain flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="relative object-cover flex flex-wrap gap-2 top-0 left-0">
                                @foreach ($destinationgalery as $galery)
                                    <div class="bg-white relative flex w-[100px] h-[100px] z-10">
                                        <button class="absolute top-0 right-0 mr-2"
                                            wire:click.prevent="deleteImage({{ $galery->id }})">x</button>
                                        <img class="object-fill"
                                            src="{{ asset('storage/destinasi/galery') }}/{{ $galery->image_galery }}"
                                            alt="">
                                    </div>
                                @endforeach
                                @if ($newgalery)
                                    @foreach ($newgalery as $image_galery)
                                        <div class="bg-white relative flex w-[100px] h-[100px] z-10">
                                            <img class="object-fill" src="{{ $image_galery->temporaryUrl() }}"
                                                alt="">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="absolute z-40">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6 hover:text-white">
                                    <svg class="w-8 h-8 mb-4 text-gray-100 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="cursor-pointer filepoond-galery">
                        <x-filepond wire:model="newgalery" multiple allowFileTypeValidation
                            acceptedFileTypes="['image/png', 'image/jpg', 'image/JPG', 'image/jpeg']"
                            allowFileSizeValidation maxFileSize="4mb" />
                        @error('newgalery.*')
                            <span class="text-xs text-red-500 dark:text-white">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div wire:ignore>
                <label class="col-sm-2 control-label dark:text-white font-semibold" for=" ">Content </label>
                <div class="col-sm-10">
                    <div class=" border border-gray-600 ">
                        <x-ckeditor id="content" name="content" wire:model="content" />
                    </div>
                </div>
            </div>
            <div>
                @error('content')
                    <span class="text-xs text-red-500 dark:text-white">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex w-full justify-end space-x-3 mt-5">
                <span class="flex rounded-md shadow-sm sm:mt-0 sm:w-auto">
                    <button wire:click.prevent="back()" type="button"
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
    @push('styles')
        <style>
            .filepoond-galery {
                .filepond--item {
                    width: calc(100% / 2 - .5em);
                }

                @media (min-width: 500px) {
                    .filepond--item {
                        width: calc(100% / 3 - .5em);
                    }
                }

                @media (min-width: 700px) {
                    .filepond--item {
                        width: calc(100% / 4 - .5em);
                    }
                }

                @media (min-width: 900px) {
                    .filepond--item {
                        width: calc(100% / 5 - .5em);
                    }
                }

                @media (min-width: 1100px) {
                    .filepond--item {
                        width: calc(100% / 6 - .5em);
                    }
                }

                @media (min-width: 1300px) {
                    .filepond--item {
                        width: calc(100% / 7 - .5em);
                    }
                }

                @media (min-width: 1500px) {
                    .filepond--item {
                        width: calc(100% / 8 - .5em);
                    }
                }

                @media (min-width: 1700px) {
                    .filepond--item {
                        width: calc(100% / 9 - .5em);
                    }
                }

                @media (min-width: 1900px) {
                    .filepond--item {
                        width: calc(100% / 10 - .5em);
                    }
                }
            }
        </style>
    @endpush
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places&callback=initialize&language=en&region=GB"
        async defer></script>
    <script src="{{ asset('js/mapInput.js') }}"></script>
</div>
