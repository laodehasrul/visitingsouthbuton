@section('title', "Dokumen Publikasi")
<div class="pt-16 md:pt-0">
    <div class="relative bg-gray-200 ">
        <div
            class="max-w-6xl px-6 xl:px-0 flex items-center py-4 mx-auto overflow-y-auto text-xs md:text-sm lg:text-md whitespace-nowrap">
            <a href="{{ route('beranda') }}" class="text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </a>

            <span class="mx-5 text-gray-500 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>

            <a href="#" class="text-teal-600 underline capitalize">
                Dokumen Publikasi
            </a>
        </div>
    </div>
    <div class="w-full max-w-6xl mx-auto py-10">
        <div class="bg-white p-6 rounded-md shadow-lg">
            <div class="my-4">
                <h4 class="font-bold text-4xl font-poppins">Dokumen Publikasi</h4>

            </div>
            <div class="relative overflow-x-auto sm:rounded-lg">
                <div class="w-1/3 relative mb-2">
                    <div wire:target="search"
                        class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg wire:loading.remove class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <div wire:loading.delay role="status">
                            <svg aria-hidden="true"
                                class="w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-teal-600"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                        </div>
                    </div>
                    <input
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                        type="text" name="" id="" wire:model="search" placeholder="Pencarian...">
                </div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead
                        class="text-md font-bold text-white uppercase bg-teal-600 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                NO
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Dokumen
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Keterangan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Link
                            </th>
                        </tr>
                    </thead>
                    <tbody wire:loading.class="invisible" wire:target="search">
                        @forelse ($data as $item)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">
                                    {{ $loop->index + 1 }}
                                </td>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->title }}
                                    <div class="flex space-x-3 text-gray-500">
                                        <div class="text-[10px] items-center flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-[14px] h-[14px] mr-1">
                                                <path
                                                    d="M5.507 4.048A3 3 0 0 1 7.785 3h8.43a3 3 0 0 1 2.278 1.048l1.722 2.008A4.533 4.533 0 0 0 19.5 6h-15c-.243 0-.482.02-.715.056l1.722-2.008Z" />
                                                <path fill-rule="evenodd"
                                                    d="M1.5 10.5a3 3 0 0 1 3-3h15a3 3 0 1 1 0 6h-15a3 3 0 0 1-3-3Zm15 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm2.25.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM4.5 15a3 3 0 1 0 0 6h15a3 3 0 1 0 0-6h-15Zm11.25 3.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM19.5 18a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {{ $item->getFileSize($item->id) }} MB
                                        </div>
                                        <div class="text-[10px] items-center flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-[14px] h-[14px] mr-1">
                                                <path fill-rule="evenodd"
                                                    d="M10.5 3.75a6 6 0 0 0-5.98 6.496A5.25 5.25 0 0 0 6.75 20.25H18a4.5 4.5 0 0 0 2.206-8.423 3.75 3.75 0 0 0-4.133-4.303A6.001 6.001 0 0 0 10.5 3.75Zm2.25 6a.75.75 0 0 0-1.5 0v4.94l-1.72-1.72a.75.75 0 0 0-1.06 1.06l3 3a.75.75 0 0 0 1.06 0l3-3a.75.75 0 1 0-1.06-1.06l-1.72 1.72V9.75Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            @if ($item->downloader > 0)
                                            {{ $item->downloader }}
                                            @else
                                                0
                                            @endif
                                            
                                        </div>
                                    </div>
                                </th>
                                <td scope="row" class="px-6 py-4 whitespace-nowrap">
                                    {{ $item->description }}
                                </td>
                                <td class="px-6 py-4">
                                    <button wire:click="download({{ $item->id }})"
                                        class="relative inline-flex items-center justify-start px-6 py-3 overflow-hidden font-medium transition-all bg-teal-500 rounded-xl group">
                                        <span
                                            class="absolute top-0 right-0 inline-block w-4 h-4 transition-all duration-500 ease-in-out bg-teal-700 rounded group-hover:-mr-4 group-hover:-mt-4">
                                            <span
                                                class="absolute top-0 right-0 w-5 h-5 rotate-45 translate-x-1/2 -translate-y-1/2 bg-white"></span>
                                        </span>
                                        <span
                                            class="absolute bottom-0 left-0 w-full h-full transition-all duration-500 ease-in-out delay-200 -translate-x-full translate-y-full bg-teal-600 rounded-xl group-hover:mb-11 group-hover:translate-x-0"></span>
                                        <span
                                            class="relative w-full text-left text-white transition-colors duration-200 ease-in-out group-hover:text-white">Download</span>
                                    </button>

                                </td>
                            </tr>
                        @empty
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">
                                    -
                                </td>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Data tidak ditemukan!
                                </th>
                                <td scope="row" class="px-6 py-4 whitespace-nowrap">
                                    -
                                </td>
                                <td class="px-6 py-4">
                                    -
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                <div class="mt-2">
                    {{ $data->links() }}
                </div>

            </div>
        </div>

    </div>


</div>
