<div class="my-10">
    @if ($show)
        @include('livewire.user.updateavatar')
    @endif
    @section('title', "User Profil")
    <div class="max-w-5xl mx-auto">
        <div class="w-full border rounded-lg p-5 bg-white shadow-xl">
            <div class="justify-between flex items-center">
                <div class="flex items-start space-x-5">
                    <div class="relative">
                        <img class="rounded-full w-[80px] h-[80px] shadow-md" src="{{ auth()->user()->avatarUrl() }}"
                            alt="">
                        <button wire:click="updateavatar"
                            class="absolute p-2 bg-gray-200 border border-gray-400 hover:bg-gray-300 hover:text-teal-400 top-0 left-0 rounded-full">
                            <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279" />
                            </svg>
                        </button>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-xl font-bold capitalize">{{ auth()->user()->name }}</h3>
                        <p>{{ auth()->user()->email }}</p>
                    </div>
                </div>
                <div>
                    <div id="tooltip-hapus" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Hapus Akun
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button type="button" wire:click="deleteConfirm({{ auth()->user()->id }})"
                        data-tooltip-target="tooltip-hapus"
                        class="hover:shadow-lg hover:shadow-red-300/50 dark:hover:shadow-red-300/50 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-800 dark:bg-red-600 dark:hover:bg-red-700">
                        <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap bg-white shadow-xl dark:bg-gray-800 mt-4 rounded-md -mb-px text-sm font-medium text-center"
                id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content"
                data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500"
                data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                role="tablist">
                <li class="me-2" role="presentation">
                    <button wire:click.prevent="selectTab('profile_settings')"
                        class="inline-block p-4 border-b-2 rounded-t-lg text-black dark:text-white {{ $tab == 'profile_settings' ? 'border-teal-500 dark:border-blue-500' : '' }}"
                        id="profile-styled-tab" data-tabs-target="#styled-profile" type="button" role="tab"
                        aria-controls="profile" aria-selected="false">Profile Setting</button>
                </li>
                <li class="me-2" role="presentation">
                    <button wire:click.prevent="selectTab('settings')"
                        class="inline-block p-4 border-b-2 rounded-t-lg text-black dark:text-white {{ $tab == 'settings' ? 'border-teal-500 dark:border-blue-500' : '' }}"
                        id="settings-styled-tab" data-tabs-target="#styled-settings" type="button" role="tab"
                        aria-controls="settings" aria-selected="false">Password & Account</button>
                </li>
            </ul>
        </div>
        <div id="default-styled-tab-content">
            <div class="{{ $tab == 'profile_settings' ? 'block' : 'hidden' }} rounded-lg bg-gray-50 dark:bg-gray-800"
                id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="bg-white dark:bg-gray-800 shadow-lg p-5">
                    <form class="max-w-full mx-auto" wire:submit.prevent="changeProfile">
                        <div class="flex space-x-5 w-full">
                            <div class="mb-5 flex-1">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Lengkap</label>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-4 h-4 text-gray-500 dark:text-gray-400">
                                            <path fill-rule="evenodd"
                                                d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </div>
                                    <input type="text" id="name" wire:model="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="mb-5 flex-1">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Email</label>
                                <div class="relative ">
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                            <path
                                                d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                            <path
                                                d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                                        </svg>
                                    </div>
                                    <input type="email" id="email" wire:model="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="name@flowbite.com">
                                </div>
                            </div>
                        </div>
                        <div class="flex space-x-5 w-full">
                            <div class="mb-5 flex-1">
                                <label for="no_telp"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kontak</label>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 19 18">
                                            <path
                                                d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="no_telp" aria-describedby="helper-text-explanation"
                                        wire:model="telp"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="123-456-7890" />
                                </div>
                            </div>
                        </div>

                        <button type="submit"
                            class="text-white bg-teal-500 hover:bg-teal-600 hover:shadow-lg hover:shadow-teal-300/50 dark:hover:shadow-blue-300/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700">Update</button>
                    </form>


                </div>
            </div>
            <div class="{{ $tab == 'settings' ? 'block' : 'hidden' }} rounded-lg bg-gray-50 dark:bg-gray-800"
                id="styled-settings" role="tabpanel" aria-labelledby="settings-tab">
                <div class="bg-white dark:bg-gray-800 shadow-lg p-5">
                    <form wire:submit.prevent="changePassword">
                        <div class="mb-6">
                            <label for="current_password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" id="current_password" wire:model="current_password"
                                name="current_password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="•••••••••" required>
                        </div>
                        <div class="mb-6">
                            <label for="new_password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                                Baru</label>
                            <input type="password" id="new_password" wire:model="new_password" name="new_password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="•••••••••" required>
                        </div>
                        <div class="mb-6">
                            <label for="new_password_confirmation"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi
                                Password
                                Baru</label>
                            <input type="password" id="new_password_confirmation"
                                wire:model="new_password_confirmation" name="new_password_confirmation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="•••••••••" required>
                        </div>
                        <button type="submit"
                            class="text-white bg-teal-500 hover:bg-teal-600 hover:shadow-lg hover:shadow-teal-300/50 dark:hover:shadow-blue-300/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700">Update</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


@push('styles')
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        FilePond.registerPlugin(FilePondPluginFileValidateType);
        FilePond.registerPlugin(FilePondPluginFileValidateSize);
        FilePond.registerPlugin(FilePondPluginImagePreview);
    </script>
@endpush
