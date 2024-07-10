@section('title', "Admin Event & Festival Management")
<div>
    @if (session('success'))
        <script>
            Swal.fire({
                type: '{{ session('success.type') }}',
                title: "Berhasil!",
                text: '{{ session('success.title') }}',
                icon: "success",
                timer: 1500,
                toast: true,
                position: 'top-right'
            });
        </script>
    @endif
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg dark:shadow-md dark:shadow-white">
        <div
            class="flex items-center justify-between w-full text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400 px-6 py-3">
            <a href="{{ route('event.create') }}"
                class="text-white bg-teal-500 hover:bg-teal-600 hover:shadow-lg hover:shadow-teal-300/50 dark:hover:shadow-blue-300/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700">
                <svg class="w-4 h-4 mr-1 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 5.757v8.486M5.757 10h8.486M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Tambah
            </a>
            <div class="">
                <div class="flex ">
                    <div class="w-1/2 mx-auto text-gray-500">
                        <section class="flex items-center justify-center">
                            <form action="#" class="flex items-center justify-center w-1/2" role="search"
                                aria-label="Sitewide">
                                <label for="search" class="sr-only">Search this site</label>
                                <input type="text" id="search" placeholder="Search" spellcheck="false"
                                    wire:model="search"
                                    class="px-6 py-2 -mr-8 font-sans transition-colors duration-300 transform bg-gray-200 border-none rounded-full focus:outline-none focus:bg-gray-300">

                                <button class="transform border-none" aria-label="Submit">
                                    <svg class="text-gray-500 duration-200 fill-current hover:text-gray-700 focus:text-gray-700"
                                        version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20">

                                        <path
                                            d="M17.545 15.467l-3.779-3.779c0.57-0.935 0.898-2.035 0.898-3.21 0-3.417-2.961-6.377-6.378-6.377s-6.186 2.769-6.186 6.186c0 3.416 2.961 6.377 6.377 6.377 1.137 0 2.2-0.309 3.115-0.844l3.799 3.801c0.372 0.371 0.975 0.371 1.346 0l0.943-0.943c0.371-0.371 0.236-0.84-0.135-1.211zM4.004 8.287c0-2.366 1.917-4.283 4.282-4.283s4.474 2.107 4.474 4.474c0 2.365-1.918 4.283-4.283 4.283s-4.473-2.109-4.473-4.474z">
                                        </path>
                                    </svg>
                                </button>
                            </form>
                        </section>
                    </div>

                </div>
            </div>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead
                class="border-b dark:border-gray-700 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Event
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jadwal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="">Action</span>
                    </th>
                </tr>
            </thead>
            <tbody wire:loading.class="invisible" wire:target="search">
                @forelse ($data as $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->description }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->date_time }}
                        </td>
                        <td
                            class="lg:flex mx-auto items-center text-center justify-center space-y-2 lg:space-y-0 lg:space-x-4 px-6 py-4">
                            <div>
                                <div id="tooltip-edit" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Edit Event
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <a href="{{ route('event.edit', $item->id) }}" data-tooltip-target="tooltip-edit"
                                    class="hover:shadow-lg hover:shadow-teal-300/50 dark:hover:shadow-blue-300/50 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-teal-500 rounded-lg hover:bg-teal-600 dark:bg-blue-600 dark:hover:bg-blue-700">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279" />
                                    </svg>
                                </a>
                            </div>
                            <div>
                                <div id="tooltip-hapus" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Hapus Event
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
                @empty
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="row pl-2">
                            <div class="flex items-center me-4">
                                -
                            </div>
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Pencarian : {{ $search }} tidak ditemukan!
                        </th>
                        <th></th>
                        <th></th>
                    </tr>
                @endforelse

            </tbody>

        </table>
        <div class="w-full mx-auto flex justify-center">
            <div role="status" wire:loading.delay wire:target="search">
                <div class="flex items-center justify-center p-5 bg-gray-100 min-w-screen w-full mx-auto">
    
                    <div class="flex space-x-2 animate-pulse">
                        <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
                    </div>
    
                </div>
            </div>
        </div>
        {{ $data->links() }}
    </div>

</div>
