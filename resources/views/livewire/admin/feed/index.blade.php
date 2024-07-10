@section('title', "Admin Feed Management")
<div
    class="py-5 shadow-md sm:rounded-lg dark:shadow-md dark:shadow-white dark:border-gray-700  bg-gray-50 dark:bg-gray-800 my-5">
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
    <div class="container flex flex-col items-center justify-center px-4 pt-2 pb-8 mx-auto sm:px-6 ">
        <div
            class="flex items-center justify-between w-full text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400 py-3">
            <div class="w-1/2 mx-auto text-gray-500">
                <section class="flex items-center justify-center">
                    <div class="flex items-center justify-center w-full" role="search" aria-label="Sitewide">
                        <label for="search" class="sr-only">Search this site</label>
                        <input type="text" id="search" placeholder="Search" spellcheck="false"
                            wire:model="search"
                            class="w-full px-6 py-2 -mr-8 font-sans transition-colors duration-300 transform bg-gray-200 border-none rounded-full focus:outline-none focus:bg-gray-300">

                        <button class="transform border-none" aria-label="Submit">
                            <svg class="text-gray-500 duration-200 fill-current hover:text-gray-700 focus:text-gray-700"
                                version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 20 20">

                                <path
                                    d="M17.545 15.467l-3.779-3.779c0.57-0.935 0.898-2.035 0.898-3.21 0-3.417-2.961-6.377-6.378-6.377s-6.186 2.769-6.186 6.186c0 3.416 2.961 6.377 6.377 6.377 1.137 0 2.2-0.309 3.115-0.844l3.799 3.801c0.372 0.371 0.975 0.371 1.346 0l0.943-0.943c0.371-0.371 0.236-0.84-0.135-1.211zM4.004 8.287c0-2.366 1.917-4.283 4.282-4.283s4.474 2.107 4.474 4.474c0 2.365-1.918 4.283-4.283 4.283s-4.473-2.109-4.473-4.474z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </section>
            </div>
        </div>
        <div class="my-5" wire:loading.delay wire:target="search">
            <div role="status">
                <div class="flex items-center justify-center p-5 bg-gray-100 min-w-screen">

                    <div class="flex space-x-2 animate-pulse">
                        <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
                    </div>

                </div>
            </div>
        </div>
        <div wire:loading.class="invisible" wire:target="search"
            class="gap-3 mx-auto mt-5 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 w-full max-w-none">
            @forelse ($data as $item)
                <div
                    class="flex flex-col overflow-hidden rounded-lg shadow-lg hover:shadow-xl dark:shadow-md dark:hover:shadow-white transform-all duration-300">
                    <div class="relative flex-shrink-0">
                        <img class="w-full h-[120px] object-cover object-center"
                            src="{{ asset('storage/story') }}/{{ $item->story_image }}" alt="">
                    </div>
                    <div class="flex flex-col justify-between flex-1">
                        <div class="flex flex-col justify-between flex-1 p-2 bg-white">
                            <div>
                                <p 
                                    class="block text-xs font-semibold leading-none text-gray-900">{{ $item->title }}</p>
                                <p class="mt-2 text-xs leading-none text-black">{{ $item->description }}</p>
                            </div>
                        </div>
                        <div class="flex items-center p-2 bg-gray-100">
                            <div class="flex-shrink-0">
                                <div >
                                    <img class="w-8 h-8 rounded-full border border-teal-500"
                                        src="{{$item->user->avatarInitial($item->user->id)}}"
                                        alt="" />
                                </div>
                            </div>
                            <div class="ml-3 flex w-full justify-between">
                                <div>
                                    <p class="text-sm font-medium leading-5 text-gray-900">
                                        {{$item->user->name}}
                                    </p>
                                    <div class="text-xs leading-5 text-gray-600">
                                        <time datetime="2020-05-31">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</time>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <div id="tooltip-hapus" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Hapus Feed
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

                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="max-w-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2395 1800" class="w-full max-w-sm"
                        width="400">
                        <defs>
                            <style>
                                .cls-10,
                                .cls-13,
                                .cls-14,
                                .cls-15,
                                .cls-17,
                                .cls-5,
                                .cls-6 {
                                    stroke: #000
                                }

                                .cls-13,
                                .cls-14,
                                .cls-8 {
                                    stroke-linecap: round;
                                    stroke-linejoin: round
                                }

                                .cls-10,
                                .cls-12,
                                .cls-13,
                                .cls-14,
                                .cls-15,
                                .cls-17,
                                .cls-3,
                                .cls-5,
                                .cls-6,
                                .cls-7,
                                .cls-8,
                                .cls-9 {
                                    stroke-width: 3px
                                }

                                .cls-10,
                                .cls-12,
                                .cls-15,
                                .cls-17,
                                .cls-3,
                                .cls-5,
                                .cls-6,
                                .cls-7,
                                .cls-9 {
                                    stroke-miterlimit: 10
                                }

                                .cls-3 {
                                    fill: #818181
                                }

                                .cls-12,
                                .cls-3,
                                .cls-7,
                                .cls-8,
                                .cls-9 {
                                    stroke: #191818
                                }

                                .cls-5 {
                                    fill: #4ea7f1
                                }

                                .cls-14,
                                .cls-6 {
                                    fill: #f8f3ed
                                }

                                .cls-7 {
                                    fill: #333
                                }

                                .cls-13,
                                .cls-8 {
                                    fill: none
                                }

                                .cls-9 {
                                    fill: #f8f59c
                                }

                                .cls-10 {
                                    fill: #f3d2c9
                                }

                                .cls-15 {
                                    fill: #8bb174
                                }

                                .cls-17 {
                                    fill: #da4e22
                                }
                            </style>
                        </defs>
                        <path
                            d="M1073.3 1016.93c-43.75-72.44-119.63-96.48-144.56-103.2h0a121.1 121.1 0 01-6-58.67c5.65-38.81 14.87-101.89 15.77-106.5L750 821.89l-191.73 64.42c3.64 3 51.12 45.51 80.31 71.69a121.07 121.07 0 0133 48.89h0c-14.84 21.13-57.72 88.19-44.92 171.84 12.09 79 67.16 129 103.83 162.39a396.42 396.42 0 0088 60.44 121.54 121.54 0 0098.43 19.6c5.76-1.34 16.84-4.18 27.22-7.38 4.58-1.42 10.4-3.23 17.06-5.57v0l1.1-.41 1.1-.39h0c6.61-2.47 12.24-4.8 16.67-6.65 10-4.19 20.35-9.11 25.63-11.77a121.54 121.54 0 0063-78.09 396.28 396.28 0 0028.85-102.77c6.82-49.07 17.06-122.78-24.25-191.2z"
                            stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke="#000"
                            fill="#d6b49a" />
                        <ellipse cx="748.2" cy="816.89" rx="202.22" ry="30.98"
                            transform="rotate(-19.91 748.327 816.983)" stroke-miterlimit="10" fill="#020202"
                            stroke-width="3" stroke="#000" />
                        <path class="cls-3"
                            d="M959 1447l-.09 82.82c0 6.19 6.66 11.22 14.88 11.23h.3c8.22 0 14.9-5 14.9-11.2l.09-81.9c0-.53-6.95-1-15.39-1H959M1749 1447l-.09 82.82c0 6.19 6.66 11.22 14.88 11.23h.3c8.22 0 14.9-5 14.9-11.2l.09-81.9c0-.53-7-1-15.39-1H1749" />
                        <path
                            d="M1825.5 1426.5H755.25a10.75 10.75 0 00-10.75 10.75h0a10.75 10.75 0 0010.75 10.75H1815a10.75 10.75 0 0010.74-11l-.24-10.5"
                            fill="#dcdbda" stroke-miterlimit="10" stroke-width="3" stroke="#000" />
                        <path class="cls-5"
                            d="M701.74 867.5s-38.62 147.5-32.18 209.29c3.84 36.88 2.64 98 1 141.4a52.4 52.4 0 01-104.76-1.3c-.27-22-2.78-38.74-.5-51.2 13.67-74.81-7.27-76 5.08-144.26q3.17-11.08 6.56-22.29c11.82-39 24.77-75.25 38.5-110.61 14.74-1.39 31.2-5.77 48.93-9.73 13.63-3.04 26.1-7.58 37.37-11.3zM719.77 1182.37c-8.92 0-15.45-12.93-18-18-17.59-34.83 9-95.59 19.32-117.16 9.86 22.2 34.32 82.46 16.74 117.16-2.66 5.15-9.17 18-18.06 18z" />
                        <path class="cls-6"
                            d="M1915.78 1027c-110.75-95.83-248-74.53-267.79-71.13-190.52 30.41-344.62 100-368.21 188.29a549.59 549.59 0 00-11.7 55.33c-47.15-8-126.29-11.92-172.38 38.22l-.23.26c-13.09 14.32-3.91 37.46 15.39 39.47 11.56 1.2 25.45 2.36 41.11 3.12 32.51 1.58 102.09 52 145.66 85.51a156.16 156.16 0 00106.71 52.93h.66c12.09 8.11 44 27.11 88.17 26.43a153 153 0 0066.95-16.73l160.38-2.2c74.24 21.55 133.85 19.3 170.18 14.75 52.21-6.53 71.81-19.57 80.58-26.78 30.3-25 41.33-63.94 49.13-102.93 16.02-80.11-9.78-202.48-104.61-284.54z" />
                        <path class="cls-6"
                            d="M1267 1198c-9.38-27.55-23.66-79.78-24.88-129.15a393.76 393.76 0 0112.55-108.79 334.61 334.61 0 01-32.62-173.74 17.07 17.07 0 0126-13l132.1 82.11a320.21 320.21 0 01150.63-4.18l119.81-98a13.73 13.73 0 0122.29 8.61 456.39 456.39 0 01-16.57 202.39 188.88 188.88 0 017.14 87.26" />
                        <path class="cls-5"
                            d="M583.29 1375.5H583s-8.5-.11-16.44-7.73c-6.25-6-.85-32.43 18-63.08 16.1 31.14 20.08 57.13 14.16 63.08-7.6 7.69-15.43 7.73-15.43 7.73z" />
                        <path class="cls-7"
                            d="M2024.5 1260.5c14.81 6.82 38.24 20.41 54 46 36.42 59.15 9.28 145.76-41.37 191.33-36.76 33.08-79.09 38.28-112.39 42.57-19.52 2.51-110 13.78-172.14-42.57-12.57-11.4-42-38.11-37.66-71.13 2.25-17 13.79-39.69 33.47-46 37.71-12.14 60.28 50.17 131.09 57.83 10.2 1.1 53.88 4.58 88-23 5.59-4.52 14.81-13 26-32 11.5-19.53 30.93-60.01 31-123.03z" />
                        <path class="cls-8" d="M1560.5 1428.5s69-32 85-94" />
                        <path class="cls-7"
                            d="M1530.83 851.27l119.81-98a13.73 13.73 0 0122.29 8.61c3.24 22.58 4.13 45.46 4.35 81S1665 911 1656.5 964.5a284.8 284.8 0 00-125.67-113.23z" />
                        <path class="cls-8"
                            d="M1408.5 1420.5c-1.77-1.54-8.83-8-9-17.67-.11-7.92 4.52-13.56 6-15.33 12.18-14.84 33.82-8.35 59-15 11.91-3.15 28.36-10.22 46-28" />
                        <ellipse class="cls-7" cx="1452.5" cy="998.5" rx="153" ry="117" />
                        <circle class="cls-9" cx="1355" cy="991" r="31.5" />
                        <path class="cls-10"
                            d="M1672.5 762.5s-70 95-77 117c-5.24 16.45 18.62 8.3 31 3.14a2.87 2.87 0 013.69 3.88l-8.3 17.53a6.35 6.35 0 007.75 8.74l9.91-3.3a2.87 2.87 0 013.56 3.83l-3.59 17.18 17 34a457.51 457.51 0 0016-202z" />
                        <path class="cls-7"
                            d="M1379.5 855.5c-43.86-27.19-89.35-56.1-133.21-83.29-9.07-5.62-23.66 1.62-23.79 12.29-.27 22.81-4 48.1 3 83 3.77 18.84 5.45 28.58 9.26 41.5a315.06 315.06 0 0019.74 50.5 199 199 0 0118-29c5.75-7.71 26.56-34.42 64-56a221.93 221.93 0 0143-19z" />
                        <path
                            d="M1222.5 782.5s75.38 65.94 84.71 83.21c.55 1 2.89 5.62 1.16 7.71-3.3 4-17.41-6.08-23.87-.92a6.77 6.77 0 00-1.62 1.92 8 8 0 00.75 8.68c2.16 2.87 5 7.47 4.73 11.84a6.33 6.33 0 01-1.15 3.63c-1.93 2.36-5.52 2.38-6.51 2.38-6.55 0-10.09-6.31-10.25-6.6a4.65 4.65 0 00-6 .13 3.51 3.51 0 00-.94 2 8.85 8.85 0 00.82 5.06c2.17 4.39-.37 18.55-1.85 24.93a93.65 93.65 0 01-11 27c-9-19.66-21.15-51-27-89a326.82 326.82 0 01-3.49-62.74c.38-7.83 1.01-14.43 1.51-19.23z"
                            fill="#f3d2c9" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                            stroke="#000" />
                        <circle class="cls-12" cx="1355" cy="991" r="22.5" />
                        <circle class="cls-9" cx="1557" cy="991" r="31.5" />
                        <circle class="cls-12" cx="1557" cy="991" r="22.5" />
                        <path class="cls-10"
                            d="M1445.26 997.13l10.24 1.37 9.39-1.34a2.14 2.14 0 012.11 3.27l-9.09 14.28a3 3 0 01-4.94.08l-9.77-14.33a2.15 2.15 0 012.06-3.33z" />
                        <path class="cls-13"
                            d="M1454.74 1016.08s2.76 17.42-17.24 15.42M1455.63 1017.08s-2.76 17.42 17.24 15.42" />
                        <path class="cls-14"
                            d="M1664.5 1001.5L1735 980M1667 1017l66.5 10.5M1244 1017l-60.5 13.5M1246.5 1000.5L1180 990" />
                        <path class="cls-15"
                            d="M497.79 404c44.57 20.37 95.3 66.11 155.71 124.48 92.79 89.66 150.8 234.43 169 289-5.77 2.68-30.23-42.68-36-40-19.27-52.74-57.27-138.85-139-223-66.8-68.78-125-119.67-172-142zM745.55 850.16c-74.68-63-179.26-139.49-214.14-152.89-89.78-34.5-169.48-49.55-221.09-50.06q8.32-8.54 16.67-17.06c49-.22 119.61 13.39 199 41 31.84 11.09 153.72 90.48 241 170.65z" />
                        <path class="cls-15"
                            d="M823.54 819.3c-17.76-23.9-59.56-97.14-83.92-120.77a597.13 597.13 0 00-166.5-113.78l-22.31 8.44a635.18 635.18 0 01182.77 131.33c17.7 18.29 54.44 85.77 68.42 104z" />
                        <path class="cls-7"
                            d="M1479.5 1367.5l34 76a192.85 192.85 0 01-51-1s-29.19-3.39-48.59-18c-13.48-10.12-14.12-17.25-14.29-19.38-.78-9.74 5.64-16.63 8.13-19l.75-.68c9-7.86 25-8.93 26-9 10.24-.63 24.39-3.28 45-8.94z" />
                        <path
                            d="M1173.28 1285.23l30.22-89.73a156.61 156.61 0 00-60 11 149.83 149.83 0 00-38 23c-1 .85-15 12.88-15.5 24.47v1.26c.23 9.77 7.33 16 10.06 18l.82.6c8.37 5.92 18.58 5.26 33.63 5.63 8.49.21 12.73.32 18 1a113.17 113.17 0 0120.77 4.77z"
                            fill="#333" stroke="#191818" stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path class="cls-17"
                            d="M292.3 344.49l-28.05-15.3a40.34 40.34 0 01-20.8-39.64l2.35-22.21a61.8 61.8 0 0126.57-44.52 29.52 29.52 0 0129.48-2.22 82.16 82.16 0 008.28 3.32 234.66 234.66 0 0186.78 54.37l-43.47 78.83z" />
                        <path class="cls-17"
                            d="M318.73 318l-.69.05a40.94 40.94 0 00-37 32l-2.68 12.12a53.57 53.57 0 0033.25 61.63l82.49 31.4 12.7-90.2-57-38.69a48.91 48.91 0 00-31.07-8.31zM465 262.82l-32.13-42.59A53.66 53.66 0 00379 200l-10.53 2.21A31.57 31.57 0 00348.89 251l27 38.3 84.61 30.61z" />
                        <circle class="cls-9" cx="395.47" cy="335.18" r="65.13" />
                        <path class="cls-17"
                            d="M410.35 262.8l-3.18 24.43c-1.27 9.71 1.05 18.92 6.5 25.82l43.66 55.28 25.6 66.79a188.3 188.3 0 0013.53-28.27s9.66-27.18 8.55-57.61c-2-56.48-41.85-101.41-48.51-108.74a21.18 21.18 0 00-11-7c-8.32-2-15.23 2.41-18.82 4.69-11.98 7.61-15.44 20.66-16.33 24.61z" />
                        <path class="cls-17"
                            d="M393 455.33l-49.4-22.83a42.53 42.53 0 01-21-55.8l10.27-23.18a56 56 0 0170.16-30l59.18 21.35A54.61 54.61 0 01497.69 404a72.53 72.53 0 01-17.51 34.08c-22.74 24.35-55.11 23-60.87 22.72a83.93 83.93 0 01-26.31-5.47zM220.48 538.45l-4.1-14.15a39.86 39.86 0 0120.26-46.64 44.74 44.74 0 0146.87 4c12.59 4.22 69.55 24.82 98.81 84.49a161.75 161.75 0 0116.25 66.83 8.26 8.26 0 01-12.57 7.19zM173.88 677.25L191 690a87.06 87.06 0 0016.42 9.6 175.79 175.79 0 0021.43 7.83c15.81 4.64 54.81 16.06 98.18.1 33.26-12.24 53.93-35 64.71-49.86a7 7 0 00-4.9-11.16l-188.3-21.35a32.86 32.86 0 00-33 17.77 27.41 27.41 0 008.34 34.32z" />
                        <path class="cls-17"
                            d="M160.14 576a63.93 63.93 0 0032.92 42l57.42 29.55c3.85 1.51 9.48 3.61 16.37 5.82a265.52 265.52 0 0045 10.4c27.27 3.24 57.36-5.36 74.44-11.41a13.29 13.29 0 008.07-17c-10.22-28.29-25.28-44.58-33.77-52.46-15.68-14.55-34.71-24.26-49.92-32a314.15 314.15 0 00-29.59-13.23l-48.9-13.51a63.9 63.9 0 00-48.09 5.84l-4.91 2.74A39.23 39.23 0 00160.14 576zM525.79 497.88a10.12 10.12 0 00-10.16 11.81c4 23.68 14.18 75.92 28.34 89.12 18.47 17.22 48.15 116.37 130.7 95.46 56.68-14.36 39.26-73.52 22.76-109.22a117 117 0 00-41.89-48.75A228.19 228.19 0 00597 509a260 260 0 00-71.21-11.12z" />
                        <path class="cls-15"
                            d="M857.63 805c2.87-1.5-27.13-292.5-111.13-404.5s-104-130-104-130-2 85 34 145 78 160 90 182 56 223 56 223z" />
                    </svg>
                </div>
                <div class="flex items-center justify-center w-full bg-gray-100">
                    <div class="flex flex-col text-gray-700 lg:flex-row lg:space-x-16 lg:space-x-reverse">
                        <div class="order-1 max-w-md px-2 text-sm md:text-base lg:px-0">
                            <header class="mb-6">
                                <h2 class="text-4xl font-bold leading-none text-gray-400 select-none lg:text-6xl">401.
                                </h2>
                                <h3 class="text-xl font-light leading-normal lg:text-3xl md:text-3xl">Maaf, kami
                                    tidak bisa
                                    temukan Feed ini.</h3>
                            </header>
                        </div>



                    </div>
                </div>
            @endforelse


        </div>
        @if (count($data) >= $amount)
            <div class="mx-auto w-full text-center justify-center my-5">
                <button wire:click="loadMore"
                    class="px-5 py-2.5 relative rounded group font-medium text-white font-medium inline-block">
                    <span
                        class="absolute top-0 left-0 w-full h-full rounded opacity-50 filter blur-sm bg-gradient-to-br from-purple-600 to-blue-500"></span>
                    <span
                        class="h-full w-full inset-0 absolute mt-0.5 ml-0.5 bg-gradient-to-br filter group-active:opacity-0 rounded opacity-50 from-purple-600 to-blue-500"></span>
                    <span
                        class="absolute inset-0 w-full h-full transition-all duration-200 ease-out rounded shadow-xl bg-gradient-to-br filter group-active:opacity-0 group-hover:blur-sm from-purple-600 to-blue-500"></span>
                    <span
                        class="absolute inset-0 w-full h-full transition duration-200 ease-out rounded bg-gradient-to-br to-purple-600 from-blue-500"></span>
                    <span class="relative">Load More</span>
                    <div wire:loading.delay wire:target="loadMore">
                        <div role="status">
                            <svg aria-hidden="true"
                                class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </button>
            </div>
        @else
            <div class="mx-auto w-full text-center justify-center my-5">
                <button disabled wire:click="loadMore"
                    class="opacity-50 px-5 py-2.5 relative rounded group font-medium text-white font-medium inline-block">
                    <span
                        class="absolute top-0 left-0 w-full h-full rounded opacity-50 filter blur-sm bg-gradient-to-br from-teal-600 to-green-500"></span>
                    <span
                        class="h-full w-full inset-0 absolute mt-0.5 ml-0.5 bg-gradient-to-br filter group-active:opacity-0 rounded opacity-50 from-teal-600 to-green-500"></span>
                    <span
                        class="absolute inset-0 w-full h-full transition-all duration-200 ease-out rounded shadow-xl bg-gradient-to-br filter group-active:opacity-0 group-hover:blur-sm from-teal-600 to-green-500"></span>
                    <span
                        class="absolute inset-0 w-full h-full transition duration-200 ease-out rounded bg-gradient-to-br to-teal-600 from-green-500"></span>
                    <span class="relative">No More</span>
                    <div wire:loading.delay wire:target="loadMore">
                        <div role="status">
                            <svg aria-hidden="true"
                                class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </button>
            </div>
        @endif
    </div>
</div>
