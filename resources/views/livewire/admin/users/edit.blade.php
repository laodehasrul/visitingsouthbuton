<div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="relative bg-gray-50 dark:bg-gray-800 inline-block align-bottom bg-white rounded-lg text-left overflow-y-scroll h-auto shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div wire:click.prevent="closeModalPopover" class="absolute top-0 right-0 mt-2 mr-3 dark:text-white ">
                <button class="text-red-500 dark:bg-white rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                            clip-rule="evenodd" />
                    </svg>

                </button>
            </div>
            <div class="p-3 mx-auto text-gray-900 dark:text-white text-md uppercase w-full border-b text-center">
                Edit User
            </div>
            <form wire:submit.prevent="changeProfile" action="">
                <div class="bg-white">
                    <div class="w-full bodark:bg-whiterder rounded-lg p-5">
                        <div class="relative">
                            <div class="relative inline-flex mx-auto w-full justify-center pb-4 border-b-2">
                                <div class="relative">
                                    <img class="rounded-full w-[60px] h-[60px] shadow-md"
                                        src="{{ $data_user->avatarInitial($data_user->id) }}" alt="">

                                </div>
                            </div>
                            <div class="mt-5">
                                <div class="flex space-x-5">
                                    <div class="w-full">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                                        <div class="flex">
                                            <span
                                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md ">
                                                <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                                </svg>
                                            </span>
                                            <input wire:model="name" type="text" id="name"
                                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 dark:focus:ring-white dark:focus:border-white"
                                                placeholder="elonmusk">
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
                                            Email</label>
                                        <div class="relative mb-2">
                                            <div
                                                class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 20 16">
                                                    <path
                                                        d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                                    <path
                                                        d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                                                </svg>
                                            </div>
                                            <input wire:model="email" type="email" id="email"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:focus:ring-white dark:focus:border-white"
                                                placeholder="name@flowbite.com">
                                        </div>
                                    </div>
                                </div>

                                <div class="w-full">
                                    <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 ">
                                        Kontak</label>
                                    <div class="relative mb-2">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4 text-gray-500" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <input wire:model="no_telp" type="tel" id="no_telp"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:focus:ring-white dark:focus:border-white"
                                            placeholder="0812****">
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">
                                        Password</label>
                                    <div class="relative mb-2">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4 text-gray-500" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M15.75 1.5a6.75 6.75 0 0 0-6.651 7.906c.067.39-.032.717-.221.906l-6.5 6.499a3 3 0 0 0-.878 2.121v2.818c0 .414.336.75.75.75H6a.75.75 0 0 0 .75-.75v-1.5h1.5A.75.75 0 0 0 9 19.5V18h1.5a.75.75 0 0 0 .53-.22l2.658-2.658c.19-.189.517-.288.906-.22A6.75 6.75 0 1 0 15.75 1.5Zm0 3a.75.75 0 0 0 0 1.5A2.25 2.25 0 0 1 18 8.25a.75.75 0 0 0 1.5 0 3.75 3.75 0 0 0-3.75-3.75Z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                        </div>
                                        <input wire:model="new_password" type="password" id="password"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:focus:ring-white dark:focus:border-white"
                                            placeholder="•••••••••">
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label for="new_password_confirmation"
                                        class="block mb-2 text-sm font-medium text-gray-900">
                                        Confirm Password</label>
                                    <div class="relative mb-2">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4 text-gray-500" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M15.75 1.5a6.75 6.75 0 0 0-6.651 7.906c.067.39-.032.717-.221.906l-6.5 6.499a3 3 0 0 0-.878 2.121v2.818c0 .414.336.75.75.75H6a.75.75 0 0 0 .75-.75v-1.5h1.5A.75.75 0 0 0 9 19.5V18h1.5a.75.75 0 0 0 .53-.22l2.658-2.658c.19-.189.517-.288.906-.22A6.75 6.75 0 1 0 15.75 1.5Zm0 3a.75.75 0 0 0 0 1.5A2.25 2.25 0 0 1 18 8.25a.75.75 0 0 0 1.5 0 3.75 3.75 0 0 0-3.75-3.75Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <input type="password" id="new_password_confirmation"
                                            wire:model="new_password_confirmation"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:focus:ring-white dark:focus:border-white"
                                            placeholder="•••••••••">
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900">
                                        Role</label>
                                    <div class="relative mb-2">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4 text-gray-500" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                                                    clip-rule="evenodd" />
                                                <path
                                                    d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                                            </svg>

                                        </div>
                                        <select id="role" wire:model="role" name="role"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:focus:ring-white dark:focus:border-white">
                                            <option selected>Pilih role</option>
                                            @if ($roles)
                                                @foreach ($roles as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($role === $item->id) selected @endif>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative p-3">
                    <div class="flex w-full justify-center space-x-3">
                        <span class="flex rounded-md shadow-sm sm:mt-0 sm:w-auto">
                            <button wire:click.prevent="closeModalPopover()" type="button"
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
                            <button wire:click.prevent="changeProfile()" type="button"
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
                                    class="absolute flex items-center justify-center w-full h-full text-teal-500 dark:text-white transition-all duration-300 transform group-hover:translate-y-full ease">Update</span>
                                <span class="relative invisible">Update</span>
                            </button>
                        </span>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
