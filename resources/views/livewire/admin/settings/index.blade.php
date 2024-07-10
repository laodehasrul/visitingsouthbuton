@section('title', "Admin Web Management")
<div>
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap bg-white shadow-md dark:shadow-white dark:bg-gray-800 mt-4 rounded-md -mb-px text-sm font-medium text-center" id="default-styled-tab"
            data-tabs-toggle="#default-styled-tab-content"
            data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500"
            data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
            role="tablist">
            <li class="me-2" role="presentation">
                <button wire:click.prevent="selectTab('general_settings')"
                    class="inline-block p-4 border-b-2 rounded-t-lg text-black dark:text-white {{$tab=='general_settings'?'border-teal-500 dark:border-blue-500':''}}" id="general-styled-tab"
                    data-tabs-target="#styled-general" type="button" role="tab" aria-controls="general"
                    aria-selected="false">General Setting</button>
            </li>
            <li class="me-2" role="presentation">
                <button wire:click.prevent="selectTab('logo_favicon')" 
                    class="inline-block p-4 border-b-2 rounded-t-lg text-black dark:text-white {{$tab=='logo_favicon'?'border-teal-500 dark:border-blue-500':''}}"
                    id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab"
                    aria-controls="dashboard" aria-selected="false">Logo & Favicon</button>
            </li>
            <li class="me-2" role="presentation">
                <button wire:click.prevent="selectTab('social_network')" 
                    class="inline-block p-4 border-b-2 rounded-t-lg text-black dark:text-white {{$tab=='social_network'?'border-teal-500 dark:border-blue-500':''}}"
                    id="settings-styled-tab" data-tabs-target="#styled-settings" type="button" role="tab"
                    aria-controls="settings" aria-selected="false">Social Network</button>
            </li>
        </ul>
    </div>
    <div id="default-styled-tab-content">
        <div class="{{ $tab == 'general_settings' ? 'block' : 'hidden' }} rounded-lg bg-gray-50 dark:bg-gray-800"
            id="styled-general" role="tabpanel" aria-labelledby="general-tab">
            <div class="bg-white dark:bg-gray-800 shadow-md p-5 dark:shadow-white rounded-md">
                <form class="max-w-full mx-auto" wire:submit.prevent="updateGeneralSettings()">
                    <div class="flex space-x-5 w-full">
                        <div class="mb-5 flex-1">
                            <label for="site_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site Name</label>
                            <input type="text" id="site_name" wire:model="site_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Visiting South Buton" required />
                        </div>
                        <div class="mb-5 flex-1">
                            <label for="site_email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site Email</label>
                            <input type="email" id="site_email" wire:model="site_email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Visiting South Buton" required />
                        </div>
                    </div>
                    <div class="flex space-x-5 w-full">
                        <div class="mb-5 flex-1">
                            <label for="site_phone"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site Phone</label>
                            <input type="text" id="site_phone" wire:model="site_phone"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Visiting South Buton" />
                        </div>
                        <div class="mb-5 flex-1">
                            <label for="site_meta_keywords"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site Meta
                                Keywords</label>
                            <input type="text" id="site_meta_keywords" wire:model="site_meta_keywords"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Visiting South Buton" />
                        </div>
                    </div>
                    <div class="flex space-x-5 w-full">
                        <div class="mb-5 flex-1">
                            <label for="site_address"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site Address</label>
                            <input type="text" id="site_address" wire:model="site_address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Visiting South Buton" />
                        </div>
                    </div>
                    <div class="flex space-x-5 w-full">
                        <div class="mb-5 flex-1">
                            <label for="site_meta_description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site meta
                                description</label>
                            <textarea id="site_meta_description" rows="4" wire:model="site_meta_description"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Leave a comment..."></textarea>
                        </div>
                    </div>

                    <button type="submit"
                        class="text-white bg-teal-500 hover:bg-teal-600 hover:shadow-lg hover:shadow-teal-300/50 dark:hover:shadow-blue-300/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700">Update</button>
                </form>


            </div>
        </div>
        <div class="{{ $tab == 'logo_favicon' ? 'block' : 'hidden' }} rounded-lg bg-gray-50 dark:bg-gray-800"
            id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            <div class="bg-white dark:bg-gray-800 shadow-md p-5 dark:shadow-white rounded-md">
                <form class="max-w-full mx-auto" enctype="multipart/form-data"
                    wire:submit.prevent="updateLogoSettings()">
                    <div class="w-full lg:flex items-start mb-5 lg:space-x-5">
                        <div class="w-full lg:w-1/2">
                            <label for="message"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site Logo</label>
                            <div class="flex items-center justify-center w-full">
                                @if ($new_site_logo)
                                    <label style="background-image: url('{{ $new_site_logo->temporaryUrl() }}')"
                                        class="relative group bg-no-repeat bg-center bg-contain flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div
                                            class="flex flex-col items-center justify-center pt-5 pb-6 hover:text-white">
                                            <svg class="w-8 h-8 mb-4 text-gray-100 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                        </div>
                                    </label>
                                @else
                                    <label
                                        style="background-image: url('{{ asset('storage/site') }}/{{ $site_logo }}')"
                                        class="bg-no-repeat bg-center bg-contain relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                        </div>
                                    </label>
                                @endif
                            </div>
                            <div>
                                <x-filepond wire:model="new_site_logo" allowFileTypeValidation
                                    acceptedFileTypes="['image/png', 'image/jpg', 'image/JPG', 'image/jpeg']"
                                    allowFileSizeValidation maxFileSize="4mb" />
                                @error('new_site_logo')
                                    <span class="text-xs text-red-500 dark:text-white">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="message"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site
                                Favicon</label>
                            <div class="flex items-center justify-center w-full">
                                @if ($new_site_favicon)
                                    <label style="background-image: url('{{ $new_site_favicon->temporaryUrl() }}')"
                                        class="relative group bg-no-repeat bg-center bg-contain flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div
                                            class="flex flex-col items-center justify-center pt-5 pb-6 hover:text-white">
                                            <svg class="w-8 h-8 mb-4 text-gray-100 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                        </div>
                                    </label>
                                @else
                                    <label
                                        style="background-image: url('{{ asset('storage/site') }}/{{ $site_favicon }}')"
                                        class="bg-no-repeat bg-center bg-contain relative flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                        </div>
                                    </label>
                                @endif
                            </div>
                            <div>
                                <x-filepond wire:model="new_site_favicon" allowFileTypeValidation
                                    acceptedFileTypes="['image/png', 'image/jpg', 'image/JPG', 'image/jpeg']"
                                    allowFileSizeValidation maxFileSize="4mb" />
                                @error('site_favicon')
                                    <span class="text-xs text-red-500 dark:text-white">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white bg-teal-500 hover:bg-teal-600 hover:shadow-lg hover:shadow-teal-300/50 dark:hover:shadow-blue-300/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700">Update</button>
                </form>
            </div>
        </div>
        <div class="{{ $tab == 'social_network' ? 'block' : 'hidden' }} rounded-lg bg-gray-50 dark:bg-gray-800"
            id="styled-settings" role="tabpanel" aria-labelledby="settings-tab">
            <div class="bg-white dark:bg-gray-800 shadow-md p-5 dark:shadow-white rounded-md">
                <form wire:submit.prevent="updateSocialNetwork">
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="facebook_url"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook
                                URL</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" height="100%"
                                        fill="currentColor" version="1.1" viewBox="0 0 512 512" width="100%"
                                        xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:serif="http://www.serif.com/"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path
                                            d="M449.446,0c34.525,0 62.554,28.03 62.554,62.554l0,386.892c0,34.524 -28.03,62.554 -62.554,62.554l-106.468,0l0,-192.915l66.6,0l12.672,-82.621l-79.272,0l0,-53.617c0,-22.603 11.073,-44.636 46.58,-44.636l36.042,0l0,-70.34c0,0 -32.71,-5.582 -63.982,-5.582c-65.288,0 -107.96,39.569 -107.96,111.204l0,62.971l-72.573,0l0,82.621l72.573,0l0,192.915l-191.104,0c-34.524,0 -62.554,-28.03 -62.554,-62.554l0,-386.892c0,-34.524 28.029,-62.554 62.554,-62.554l386.892,0Z" />
                                    </svg>
                                </div>
                                <input type="url" id="facebook_url" wire:model="facebook_url"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="name@flowbite.com">
                            </div>
                        </div>
                        <div>
                            <label for="twitter_url"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Twitter
                                URL</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" height="100%"
                                        fill="currentColor" version="1.1" viewBox="0 0 512 512" width="100%"
                                        xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:serif="http://www.serif.com/"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path
                                            d="M449.446,0c34.525,0 62.554,28.03 62.554,62.554l0,386.892c0,34.524 -28.03,62.554 -62.554,62.554l-386.892,0c-34.524,0 -62.554,-28.03 -62.554,-62.554l0,-386.892c0,-34.524 28.029,-62.554 62.554,-62.554l386.892,0Zm-253.927,424.544c135.939,0 210.268,-112.643 210.268,-210.268c0,-3.218 0,-6.437 -0.153,-9.502c14.406,-10.421 26.973,-23.448 36.935,-38.314c-13.18,5.824 -27.433,9.809 -42.452,11.648c15.326,-9.196 26.973,-23.602 32.49,-40.92c-14.252,8.429 -30.038,14.56 -46.896,17.931c-13.487,-14.406 -32.644,-23.295 -53.946,-23.295c-40.767,0 -73.87,33.104 -73.87,73.87c0,5.824 0.613,11.494 1.992,16.858c-61.456,-3.065 -115.862,-32.49 -152.337,-77.241c-6.284,10.881 -9.962,23.601 -9.962,37.088c0,25.594 13.027,48.276 32.95,61.456c-12.107,-0.307 -23.448,-3.678 -33.41,-9.196l0,0.92c0,35.862 25.441,65.594 59.311,72.49c-6.13,1.686 -12.72,2.606 -19.464,2.606c-4.751,0 -9.348,-0.46 -13.946,-1.38c9.349,29.426 36.628,50.728 68.965,51.341c-25.287,19.771 -57.164,31.571 -91.8,31.571c-5.977,0 -11.801,-0.306 -17.625,-1.073c32.337,21.15 71.264,33.41 112.95,33.41Z" />
                                    </svg>
                                </div>
                                <input type="url" id="twitter_url" wire:model="twitter_url"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="name@flowbite.com">
                            </div>
                        </div>
                        <div>
                            <label for="instagram_url"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram
                                URL</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" height="100%"
                                        fill="currentColor" version="1.1" viewBox="0 0 512 512" width="100%"
                                        xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:serif="http://www.serif.com/"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path
                                            d="M449.446,0c34.525,0 62.554,28.03 62.554,62.554l0,386.892c0,34.524 -28.03,62.554 -62.554,62.554l-386.892,0c-34.524,0 -62.554,-28.03 -62.554,-62.554l0,-386.892c0,-34.524 28.029,-62.554 62.554,-62.554l386.892,0Zm-193.446,81c-47.527,0 -53.487,0.201 -72.152,1.053c-18.627,0.85 -31.348,3.808 -42.48,8.135c-11.508,4.472 -21.267,10.456 -30.996,20.184c-9.729,9.729 -15.713,19.489 -20.185,30.996c-4.326,11.132 -7.284,23.853 -8.135,42.48c-0.851,18.665 -1.052,24.625 -1.052,72.152c0,47.527 0.201,53.487 1.052,72.152c0.851,18.627 3.809,31.348 8.135,42.48c4.472,11.507 10.456,21.267 20.185,30.996c9.729,9.729 19.488,15.713 30.996,20.185c11.132,4.326 23.853,7.284 42.48,8.134c18.665,0.852 24.625,1.053 72.152,1.053c47.527,0 53.487,-0.201 72.152,-1.053c18.627,-0.85 31.348,-3.808 42.48,-8.134c11.507,-4.472 21.267,-10.456 30.996,-20.185c9.729,-9.729 15.713,-19.489 20.185,-30.996c4.326,-11.132 7.284,-23.853 8.134,-42.48c0.852,-18.665 1.053,-24.625 1.053,-72.152c0,-47.527 -0.201,-53.487 -1.053,-72.152c-0.85,-18.627 -3.808,-31.348 -8.134,-42.48c-4.472,-11.507 -10.456,-21.267 -20.185,-30.996c-9.729,-9.728 -19.489,-15.712 -30.996,-20.184c-11.132,-4.327 -23.853,-7.285 -42.48,-8.135c-18.665,-0.852 -24.625,-1.053 -72.152,-1.053Zm0,31.532c46.727,0 52.262,0.178 70.715,1.02c17.062,0.779 26.328,3.63 32.495,6.025c8.169,3.175 13.998,6.968 20.122,13.091c6.124,6.124 9.916,11.954 13.091,20.122c2.396,6.167 5.247,15.433 6.025,32.495c0.842,18.453 1.021,23.988 1.021,70.715c0,46.727 -0.179,52.262 -1.021,70.715c-0.778,17.062 -3.629,26.328 -6.025,32.495c-3.175,8.169 -6.967,13.998 -13.091,20.122c-6.124,6.124 -11.953,9.916 -20.122,13.091c-6.167,2.396 -15.433,5.247 -32.495,6.025c-18.45,0.842 -23.985,1.021 -70.715,1.021c-46.73,0 -52.264,-0.179 -70.715,-1.021c-17.062,-0.778 -26.328,-3.629 -32.495,-6.025c-8.169,-3.175 -13.998,-6.967 -20.122,-13.091c-6.124,-6.124 -9.917,-11.953 -13.091,-20.122c-2.396,-6.167 -5.247,-15.433 -6.026,-32.495c-0.842,-18.453 -1.02,-23.988 -1.02,-70.715c0,-46.727 0.178,-52.262 1.02,-70.715c0.779,-17.062 3.63,-26.328 6.026,-32.495c3.174,-8.168 6.967,-13.998 13.091,-20.122c6.124,-6.123 11.953,-9.916 20.122,-13.091c6.167,-2.395 15.433,-5.246 32.495,-6.025c18.453,-0.842 23.988,-1.02 70.715,-1.02Zm0,53.603c-49.631,0 -89.865,40.234 -89.865,89.865c0,49.631 40.234,89.865 89.865,89.865c49.631,0 89.865,-40.234 89.865,-89.865c0,-49.631 -40.234,-89.865 -89.865,-89.865Zm0,148.198c-32.217,0 -58.333,-26.116 -58.333,-58.333c0,-32.217 26.116,-58.333 58.333,-58.333c32.217,0 58.333,26.116 58.333,58.333c0,32.217 -26.116,58.333 -58.333,58.333Zm114.416,-151.748c0,11.598 -9.403,20.999 -21.001,20.999c-11.597,0 -20.999,-9.401 -20.999,-20.999c0,-11.598 9.402,-21 20.999,-21c11.598,0 21.001,9.402 21.001,21Z" />
                                    </svg>
                                </div>
                                <input type="url" id="instagram_url" wire:model="instagram_url"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="name@flowbite.com">
                            </div>
                        </div>
                        <div>
                            <label for="youtube_url"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Youtube
                                URL</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" height="100%"
                                        fill="currentColor" version="1.1" viewBox="0 0 512 512" width="100%"
                                        xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:serif="http://www.serif.com/"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path
                                            d="M449.446,0c34.525,0 62.554,28.03 62.554,62.554l0,386.892c0,34.524 -28.03,62.554 -62.554,62.554l-386.892,0c-34.524,0 -62.554,-28.03 -62.554,-62.554l0,-386.892c0,-34.524 28.029,-62.554 62.554,-62.554l386.892,0Zm-20.967,175.63c-4.139,-15.489 -16.337,-27.687 -31.826,-31.826c-28.078,-7.524 -140.653,-7.524 -140.653,-7.524c0,0 -112.575,0 -140.653,7.524c-15.486,4.139 -27.686,16.337 -31.826,31.826c-7.521,28.075 -7.521,86.652 -7.521,86.652c0,0 0,58.576 7.521,86.648c4.14,15.489 16.34,27.69 31.826,31.829c28.078,7.521 140.653,7.521 140.653,7.521c0,0 112.575,0 140.653,-7.521c15.489,-4.139 27.687,-16.34 31.826,-31.829c7.521,-28.072 7.521,-86.648 7.521,-86.648c0,0 0,-58.577 -7.521,-86.652Zm-208.481,140.653l0,-108.002l93.53,54.001l-93.53,54.001Z" />
                                    </svg>
                                </div>
                                <input type="url" id="youtube_url" wire:model="youtube_url"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="name@flowbite.com">
                            </div>
                        </div>
                        <div>
                            <label for="tiktok_url"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tiktok URL</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" data-name="Layer 1"
                                        id="Layer_1" fill="currentColor" viewBox="0 0 512 512"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <title />
                                        <rect height="412.22" rx="55.43" width="412.22" x="49.89" y="49.89" />
                                        <path
                                            d="M348.31,201V190.9s-22.7-1.43-39.31-19.4C319.78,191.19,337.8,198.44,348.31,201Z"
                                            fill="#80c7cf" />
                                        <path
                                            d="M171.34,274.28c15.3-30.41,42.44-36,56-36.77V226s-43.34-5-64.33,36.72c0,0-21.87,41.89,8.4,76C154,307.38,171.34,274.28,171.34,274.28Z"
                                            fill="#80c7cf" />
                                        <path
                                            d="M235.11,341.37c34-5.8,33.87-34,33.87-34V148.75h27a77,77,0,0,1-2.89-11.59H260.7V295.81s.9,31.23-33.87,34c0,0-15.14,1.19-26.42-8.71C210,343.36,235.11,341.37,235.11,341.37Z"
                                            fill="#80c7cf" />
                                        <path
                                            d="M301.37,148.75H296a60.94,60.94,0,0,0,13,22.75A70.31,70.31,0,0,1,301.37,148.75Z"
                                            fill="#e03855" />
                                        <path
                                            d="M188.45,291.67c.5,14.8,5.63,23.82,12,29.39a48.5,48.5,0,0,1-3.67-17.79s.82-32.86,38.92-31.75v-34a56.49,56.49,0,0,0-8.28-.05v22.41C189.28,258.82,188.45,291.67,188.45,291.67Z"
                                            fill="#e03855" />
                                        <path
                                            d="M348.31,201V227.9c-36.72,3.86-55.22-26.51-55.22-26.51V295c-2.21,32.31-18.77,46.11-18.77,46.11-44.36,41-87.8,10.77-87.8,10.77a81.7,81.7,0,0,1-15.07-13.16c4.79,8.63,12.21,17.12,23.35,24.75,0,0,43.07,31.75,87.8-10.76,0,0,17.34-14.55,18.77-46.11V213s18.5,30.37,55.22,26.5v-37A53.5,53.5,0,0,1,348.31,201Z"
                                            fill="#e03855" />
                                        <path
                                            d="M186.52,351.86s44.13,30.45,87.8-10.77c0,0,17.8-13.44,18.77-46.11V201.39s18.5,30.37,55.22,26.51V201c-10.51-2.6-28.53-9.85-39.31-29.54a60.94,60.94,0,0,1-13-22.75H269V307.41s.09,28.16-33.87,34c0,0-25.09,2-34.7-20.31-6.33-5.57-11.46-14.59-12-29.39,0,0,.83-32.85,38.93-31.75V237.51c-13.6.8-40.74,6.36-56,36.77,0,0-17.3,33.1.11,64.42A81.7,81.7,0,0,0,186.52,351.86Z"
                                            fill="#fff" />
                                    </svg>
                                </div>
                                <input type="url" id="tiktok_url" wire:model="tiktok_url"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="name@flowbite.com">
                            </div>
                        </div>

                    </div>
                    <button type="submit"
                        class="text-white bg-teal-500 hover:bg-teal-600 hover:shadow-lg hover:shadow-teal-300/50 dark:hover:shadow-blue-300/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
