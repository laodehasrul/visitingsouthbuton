@section('title', "Admin Inbox Management")
<div>
    <div class="w-full my-5 flex justify-between items-center px-3">
        <div class="flex gap-2 items-center">
            <button type="button" wire:click="filterInboxByStatus"
                class="inline-flex items-center text-gray-900 bg-gray-100 border border-gray-300 focus:outline-none hover:bg-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 hover:shadow-lg hover:shadow-teal-300/50 dark:hover:shadow-blue-300/50  {{ is_null($status) ? 'bg-teal-500 text-white hover:bg-teal-500 dark:bg-blue-500 dark:hover:bg-blue-500' : 'dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700' }}">

                Semua
                <span class="ml-2">({{ $inbox }})</span>
            </button>
            <button type="button" wire:click="filterInboxByStatus('read')"
                class="inline-flex items-center text-gray-900 bg-gray-100 border border-gray-300 focus:outline-none hover:bg-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 hover:shadow-lg hover:shadow-teal-300/50 dark:hover:shadow-blue-300/50  {{ $status === 'read' ? 'bg-teal-500 text-white hover:bg-teal-500 dark:bg-blue-500 dark:hover:bg-blue-500' : 'dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700' }}">

                Read
                <span class="ml-2">({{ $inboxread }})</span>
            </button>
            <button type="button" wire:click="filterInboxByStatus('unread')"
                class="inline-flex items-center text-gray-900 bg-gray-100 border border-gray-300 focus:outline-none hover:bg-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 hover:shadow-lg hover:shadow-teal-300/50 dark:hover:shadow-blue-300/50  {{ $status === 'unread' ? 'bg-teal-500 text-white hover:bg-teal-500 dark:bg-blue-500 dark:hover:bg-blue-500' : 'dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700' }}">

                Unread
                <span class="ml-2">({{ $inboxunread }})</span>
            </button>

            <div class="text-sm text-gray-500">
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                    class="inline-flex items-center text-gray-900 bg-gray-100 border border-gray-300 focus:outline-none hover:bg-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 hover:shadow-lg hover:shadow-teal-300/50 dark:hover:shadow-blue-300/50"
                    type="button">Bulk Action<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="#" wire:click.prevent="markAllAsRead"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Baca</a>
                        </li>
                        <li>
                            <a href="#" wire:click.prevent="deleteSelectedRows"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hapus</a>
                        </li>
                    </ul>
                </div>
                @if ($selectedRows)
                    <span>selected {{ count($selectedRows) }} pesan </span>
                @endif
            </div>
        </div>

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
    @if ($isModalOpen)
        @include('livewire.admin.inbox.show')
    @endif
    <div class="p-2 dark:bg-gray-800 rounded-md shadow-md dark:shadow-white">
        <table class="w-full text-sm text-left text-gray-500 dark:text-white">
            <thead
                class="relative text-xs text-gray-700 dark:text-white uppercase bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50">
                <tr>
                    <th class="pl-2">
                        <div class="flex items-center me-4">
                            <input wire:model="selectPageRows" id="pageRows" type="checkbox" value=""
                                class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="pageRows" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Pengirim
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Subjek
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="">Status</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="">Action</span>
                    </th>
                </tr>
            </thead>
    
            <tbody wire:loading.class="invisible" wire:target="search" class="relative">
                @forelse ($data as $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="row pl-2">
                            <div class="flex items-center me-4">
                                <input id="{{ $item->id }}" wire:model="selectedRows" type="checkbox"
                                    value="{{ $item->id }}"
                                    class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="{{ $item->id }}"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                            </div>
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->fullname }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->subject }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($item->status == 'read')
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Read</span>
                            @else
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">Unread</span>
                            @endif
                        </td>
                        <td
                            class="lg:flex mx-auto items-center text-center justify-center space-y-2 lg:space-y-0 lg:space-x-4 px-6 py-4">
                            <div>
                                <div id="tooltip-show" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Baca Pesan
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <button type="button" data-tooltip-target="tooltip-show"
                                    wire:click="showMessage({{ $item->id }})"
                                    class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-3 h-3">
                                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                        <path fill-rule="evenodd"
                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
    
                            <div>
                                <div id="tooltip-hapus" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Hapus Pesan
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <button type="button" wire:click="deleteConfirm({{ $item->id }})"
                                    data-tooltip-target="tooltip-hapus"
                                    class="hover:shadow-lg hover:shadow-red-300/50 dark:hover:shadow-red-300/50 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-800 dark:bg-red-600 dark:hover:bg-red-700">
                                    <svg class="w-3 h-3 lg:mr-1 text-white" aria-hidden="true"
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
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Tidak ada pesan!
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

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
    <div class="w-full items-center mx-auto justify-center flex text-center">
        {{ $data->links() }}
    </div>
</div>
