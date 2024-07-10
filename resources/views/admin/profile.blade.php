<x-admin-layout>
    <h1 class="my-2 text-2xl font-semibold">Profile</h1>
    <div class="space-y-5">
        <div class="bg-white rounded-md p-5 space-y-5 shadow-md">
            <div class="flex">
                <img class="rounded-md w-[80px] h-[80px]"
                    src="https://flowbite.com/application-ui/demo/images/users/jese-leos-2x.png" alt="">
                <div class="ml-2 text-gray-600">
                    <h2 class="text-black font-bold text-xl">La Ode Hasrul</h2>
                    <p>Admin</p>
                </div>
            </div>
            <div class="ml-2 text-gray-600">
                <p>Email</p>
                <p class="text-black">achilaode@gmail.com</p>
            </div>
            <div class="ml-2 text-gray-600">
                <p>Nomor HP</p>
                <p class="text-black">081328695433</p>
            </div>
        </div>
        <div class="w-full bg-white rounded-md p-5 space-y-5 shadow-md">
            <div class="flex">
                <h1 class="font-bold text-xl">Informasi Umum</h1>
            </div>
            <form>
                <div class="mb-6 flex">
                    <div class="item-scenter">
                        <img class="mx-auto rounded-md w-[80px] h-[80px]"
                            src="https://flowbite.com/application-ui/demo/images/users/jese-leos-2x.png" alt="">
                        <x-filepond wire:model="image_profile" />
                        @error('image_profile') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="mb-6">
                    <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Lengkap</label>
                    <input type="text" id="fullname"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="La Ode Hasrul" required>
                </div>
                <div class="mb-6">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="achilaode@gmail.com" required>
                </div>
                <div class="mb-6">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                        number</label>
                    <input type="tel" id="phone"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
            </form>
        </div>
        <div class="w-full bg-white rounded-md p-5 space-y-5 shadow-md">
            <div class="flex">
                <h1 class="font-bold text-xl">Password</h1>
            </div>
            <form>
                <div class="mb-6">
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="•••••••••" required>
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Baru</label>
                    <input type="password" id="confirm_password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="•••••••••" required>
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password
                        Baru</label>
                    <input type="password" id="confirm_password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="•••••••••" required>
                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
            </form>
        </div>

    </div>
    </div>

</x-admin-layout>