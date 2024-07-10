@section('title', "Admin Profile Management")
<div>
    <h1 class="my-4 text-3xl font-semibold text-center">Profile</h1>
    <div class="space-y-5">
        <div class="mx-auto w-full max-w-3xl text-black dark:text-white bg-white dark:bg-gray-800 rounded-md p-5 space-y-5 shadow-md">
            <div class="flex">
                <h1 class="font-bold text-xl">Informasi Umum</h1>
            </div>
            <form wire:submit.prevent="changeProfile">
                <div class="mb-6">
                    <div class="item-scenter mx-auto mb-2">
                        @if ($newavatar)
                        <img class="mx-auto rounded-md w-[120px] h-[120px] shadow-md"
                            src="{{ $newavatar->temporaryUrl() }}" alt="">
                        @else
                        <img class="mx-auto rounded-md w-[120px] h-[120px] shadow-md"
                            src="{{ auth()->user()->avatarUrl() }}" alt="">
                        @endif
                    </div>
                    <x-filepond wire:model="newavatar" allowFileTypeValidation
                        acceptedFileTypes="['image/png', 'image/jpg', 'image/JPG', 'image/jpeg']"
                        allowFileSizeValidation maxFileSize="4mb" />
                    @error('image_profile') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-6">
                    <label for="changename" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Lengkap</label>
                    <input type="text" id="changename" wire:model="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="La Ode Hasrul" required>
                </div>
                <div class="mb-6">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" id="email" wire:model="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="achilaode@gmail.com" required>
                    <div>@error('email') {{ $message }} @enderror</div>
                </div>
                <div class="mb-6">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor HP</label>
                    <input type="tel" id="phone" wire:model="telp"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="123-45-678" required>
                    <div>@error('telp') {{ $message }} @enderror</div>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
            </form>
        </div>
        <div class="mx-auto w-full max-w-3xl text-black dark:text-white bg-white dark:bg-gray-800 rounded-md p-5 space-y-5 shadow-md">
            <div class="flex">
                <h1 class="font-bold text-xl">Password</h1>
            </div>
            <form wire:submit.prevent="changePassword">
                <div class="mb-6">
                    <label for="current_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" id="current_password" wire:model="current_password" name="current_password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="•••••••••" required>
                </div>
                <div class="mb-6">
                    <label for="new_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Baru</label>
                    <input type="password" id="new_password" wire:model="new_password" name="new_password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="•••••••••" required>
                </div>
                <div class="mb-6">
                    <label for="new_password_confirmation"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password
                        Baru</label>
                    <input type="password" id="new_password_confirmation" wire:model="new_password_confirmation"
                        name="new_password_confirmation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="•••••••••" required>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
            </form>
        </div>
    </div>
</div>