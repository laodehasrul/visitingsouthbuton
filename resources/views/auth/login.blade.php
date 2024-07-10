<x-guest-layout>
    @section('title', "Login")
    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ isset($guard) ? url($guard. '/login') : route('login') }}">
        @csrf
        <div class="w-full flex h-screen m-auto mt-4">
            <div
                class="flex w-full max-w-sm m-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-6xl">
                <div class="hidden bg-cover lg:block lg:w-1/2"
                    style="background-image: url('https://images.unsplash.com/photo-1606660265514-358ebbadc80d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1575&q=80');">
                </div>
                <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">
                    <div class="flex justify-center mx-auto">
                        <img class="w-auto h-7 sm:h-8 md:h-12" src="{{asset('images\logo\logo-southbuton.png')}}" alt="">
                    </div>
                    

                    <div class="flex items-center justify-between mt-4">
                        <span class="w-1/5 border-b dark:border-gray-600 lg:w-1/4"></span>
                        <p class="text-xl text-center text-gray-600 dark:text-gray-200">
                            Welcome back!
                        </p>
                        <span class="w-1/5 border-b dark:border-gray-400 lg:w-1/4"></span>
                    </div>
                    <div class="mt-4">
                        <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200"
                            for="LoggingEmailAddress">Email Address</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            autocomplete="username"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" />
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-start">
                            <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200"
                                for="loggingPassword">Password</label>
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" />
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="flex items-center justify-between mt-2">
                        <div class="block">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md"
                            href="{{ route('register') }}">
                            {{ __('Belum Punya Akun?') }}
                        </a>
                        </div>
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md"
                            href="/lupa-password">
                            {{ __('Lupa Password?') }}
                        </a>
                    </div>
                    <div class="mt-6">
                        <button type="submit"
                            class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gray-800 rounded-lg hover:bg-gray-700 ">
                            Sign In
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>