@section('title', "Admin Category Management")
<div>
    @if ($isModalOpen)
        @include('livewire.admin.destinasi.kategori.create')
    @endif
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2 dark:shadow-md dark:shadow-white">
        <div
            class="flex items-center justify-between w-full text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:border-gray-700 px-6 py-3">
            <button wire:click="create()"
                class="text-white bg-teal-500 hover:bg-teal-600 hover:shadow-lg hover:shadow-teal-300/50 dark:hover:shadow-blue-300/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700">
                <svg class="w-4 h-4 text-white mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 5.757v8.486M5.757 10h8.486M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Tambah Kategori
            </button>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead
                class="border-b dark:border-gray-700 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="">Action</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->description }}
                        </td>
                        <td
                            class="lg:flex text-center mx-auto items-center text-center justify-center space-y-2 lg:space-y-0 lg:space-x-4 px-6 py-4">
                            <div>
                                <div id="tooltip-edit" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Edit Kategori
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <button type="button" wire:click="showEditModal({{ $item->id }})"
                                    data-tooltip-target="tooltip-edit"
                                    class="hover:shadow-lg hover:shadow-teal-300/50 dark:hover:shadow-blue-300/50 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-teal-500 rounded-lg hover:bg-teal-600 dark:bg-blue-600 dark:hover:bg-blue-700">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279" />
                                    </svg>
                                </button>
                            </div>
                            <div>
                                <div id="tooltip-hapus" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Hapus Kategori
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <button type="button" wire:click="deleteConfirm({{ $item->id }})"
                                    data-tooltip-target="tooltip-hapus"
                                    class="hover:shadow-lg hover:shadow-red-300/50 dark:hover:shadow-red-300/50 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-800 dark:bg-red-600 dark:hover:bg-red-700">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @if ($item->childrens->count())
                        @foreach ($item->childrens as $item2)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item2->title }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item2->description }}
                                </td>
                                <td
                                    class="lg:flex text-center mx-auto items-center text-center justify-center space-y-2 lg:space-y-0 lg:space-x-4 px-6 py-4">
                                    <div>
                                        <div id="tooltip-edit" role="tooltip"
                                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            Edit Kategori
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                        <button type="button" wire:click="showEditModal({{ $item2->id }})"
                                            data-tooltip-target="tooltip-edit"
                                            class="hover:shadow-lg hover:shadow-teal-300/50 dark:hover:shadow-blue-300/50 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-teal-500 rounded-lg hover:bg-teal-600 dark:bg-blue-600 dark:hover:bg-blue-700">
                                            <svg class="w-3 h-3 text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div>
                                        <div id="tooltip-hapus" role="tooltip"
                                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            Hapus Kategori
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                        <button type="button" wire:click="deleteConfirm({{ $item2->id }})"
                                            data-tooltip-target="tooltip-hapus"
                                            class="hover:shadow-lg hover:shadow-red-300/50 dark:hover:shadow-red-300/50 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-800 dark:bg-red-600 dark:hover:bg-red-700">
                                            <svg class="w-3 h-3 text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach

            </tbody>
        </table>
    </div>
</div>
