<x-guest-layout>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">

            <div
                class="w-full p-6 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700 sm:p-8">
                <h2
                    class="mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Lupa Password?
                </h2>
                <span class="text-gray-700 text-sm">Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan
                    mengirimkan email berisi tautan pengaturan ulang kata sandi yang memungkinkan Anda memilih yang
                    baru.</span>
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <x-validation-errors class="mb-4" />
                <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="block">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                            required autofocus autocomplete="username" />
                    </div>
                    <x-button>
                        {{ __('Email Password Reset Link') }}
                    </x-button>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>
