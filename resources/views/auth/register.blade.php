<x-guest-layout>
    @section('title', "Register")
    <div class="flex justify-center min-h-screen text-gray-900 bg-gray-100">
        <div class="flex justify-center flex-1 m-0 bg-white shadow sm:m-20 sm:rounded-lg">

            <div class="flex-1 hidden text-center bg-indigo-100 lg:flex">
                <div class="w-full m-12 bg-center bg-no-repeat bg-contain xl:m-16"
                    style="background-image: url('https://svgshare.com/i/QeB.svg');"></div>
            </div>

            <div class="p-6 lg:w-1/2 xl:w-5/12 sm:p-12">

                <div class="flex flex-col items-center mt-4">
                    <div class="flex-1 w-full mt-4">
                        <div class="flex justify-center mx-auto">
                            <img class="w-auto h-7 sm:h-8 md:h-12" src="{{asset('images\logo\logo-southbuton.png')}}" alt="">
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <span class="w-1/5 border-b dark:border-gray-600 lg:w-1/4"></span>
                            <p class="text-xl text-center text-gray-600 dark:text-gray-200">
                                Welcome!
                            </p>
                            <span class="w-1/5 border-b dark:border-gray-400 lg:w-1/4"></span>
                        </div>
                        <form class="mt-4" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="max-w-xs mx-auto">
                                <input id="name" name="name" :value="old('name')" required autofocus autocomplete="name"
                                    class="w-full px-6 py-4 text-sm font-medium placeholder-gray-500 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:border-gray-400 focus:bg-white"
                                    type="text" placeholder="Nama Lengkap" />
                                <input id="email" name="email" :value="old('email')" required autocomplete="email"
                                    class="w-full px-6 py-4 mt-5 text-sm font-medium placeholder-gray-500 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:border-gray-400 focus:bg-white"
                                    type="email" placeholder="Email" />
                                <input id="password" name="password" required autocomplete="new-password"
                                    class="w-full px-6 py-4 mt-5 text-sm font-medium placeholder-gray-500 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:border-gray-400 focus:bg-white"
                                    type="password" placeholder="Password" />
                                <input id="password_confirmation" type="password" name="password_confirmation" required
                                    autocomplete="new-password"
                                    class="w-full px-6 py-4 mt-5 text-sm font-medium placeholder-gray-500 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:border-gray-400 focus:bg-white"
                                    type="password" placeholder="Konfirmasi Ulang Password" />
                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <x-label for="terms">
                                        <div class="flex items-center">
                                            <x-checkbox name="terms" id="terms" required />

                                            <div class="ml-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms
                                                    of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy
                                                    Policy').'</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-label>
                                </div>
                                @endif
                                <button type="submit"
                                    class="flex items-center justify-center w-full py-4 mt-5 font-semibold tracking-wide text-gray-100 transition-all duration-300 ease-in-out bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:shadow-outline focus:outline-none">
                                    <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                        <circle cx="8.5" cy="7" r="4" />
                                        <path d="M20 8v6M23 11h-6" />
                                    </svg>
                                    <span class="ml-3">
                                        Daftar
                                    </span>
                                </button>
                                <div class="flex items-center justify-end mt-4">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md"
                                        href="{{ route('login') }}">
                                        {{ __('Sudah Mendaftar?') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>