<nav x-data="{ isOpen: false }" class="fixed w-full z-20">
    <div class="sticky w-full bg-teal-500 z-40">
        <div class="flex z-10 w-full items-center mx-auto justify-between max-w-5xl py-2 px-2 lg:px-0">
            <div class="text-white text-md">
                {{ \Carbon\Carbon::parse( now()->toDateTimeString())->format('d/m/Y')}}
            </div>
            <div class="flex justify-center lg:flex lg:mt-0 lg:-mx-2">
                <a href="#" class="mx-2 text-white transition-colors duration-300 transform hover:text-gray-500"
                    aria-label="Facebook">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 50 50"
                        fill="none" class="fill-current">
                        <path
                            d="M25,3C12.85,3,3,12.85,3,25c0,11.03,8.125,20.137,18.712,21.728V30.831h-5.443v-5.783h5.443v-3.848 c0-6.371,3.104-9.168,8.399-9.168c2.536,0,3.877,0.188,4.512,0.274v5.048h-3.612c-2.248,0-3.033,2.131-3.033,4.533v3.161h6.588 l-0.894,5.783h-5.694v15.944C38.716,45.318,47,36.137,47,25C47,12.85,37.15,3,25,3z">
                        </path>
                    </svg>
                </a>
                <a href="#" class="mx-2 text-white transition-colors duration-300 transform hover:text-gray-500"
                    aria-label="Twitter">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 50 50"
                        fill="none" class="fill-current">
                        <path
                            d="M25,2C12.317,2,2,12.317,2,25s10.317,23,23,23s23-10.317,23-23S37.683,2,25,2z M36.237,20.524 c0.01,0.236,0.016,0.476,0.016,0.717C36.253,28.559,30.68,37,20.491,37c-3.128,0-6.041-0.917-8.491-2.489 c0.433,0.052,0.872,0.077,1.321,0.077c2.596,0,4.985-0.884,6.879-2.37c-2.424-0.044-4.468-1.649-5.175-3.847 c0.339,0.065,0.686,0.1,1.044,0.1c0.505,0,0.995-0.067,1.458-0.195c-2.532-0.511-4.441-2.747-4.441-5.432c0-0.024,0-0.047,0-0.07 c0.747,0.415,1.6,0.665,2.509,0.694c-1.488-0.995-2.464-2.689-2.464-4.611c0-1.015,0.272-1.966,0.749-2.786 c2.733,3.351,6.815,5.556,11.418,5.788c-0.095-0.406-0.145-0.828-0.145-1.262c0-3.059,2.48-5.539,5.54-5.539 c1.593,0,3.032,0.672,4.042,1.749c1.261-0.248,2.448-0.709,3.518-1.343c-0.413,1.292-1.292,2.378-2.437,3.064 c1.122-0.136,2.188-0.432,3.183-0.873C38.257,18.766,37.318,19.743,36.237,20.524z">
                        </path>
                    </svg>
                </a>
                <a href="#" class="mx-2 text-white transition-colors duration-300 transform hover:text-gray-500"
                    aria-label="Instagram">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 50 50"
                        fill="none" class="fill-current">
                        <path
                            d="M 16 3 C 8.83 3 3 8.83 3 16 L 3 34 C 3 41.17 8.83 47 16 47 L 34 47 C 41.17 47 47 41.17 47 34 L 47 16 C 47 8.83 41.17 3 34 3 L 16 3 z M 37 11 C 38.1 11 39 11.9 39 13 C 39 14.1 38.1 15 37 15 C 35.9 15 35 14.1 35 13 C 35 11.9 35.9 11 37 11 z M 25 14 C 31.07 14 36 18.93 36 25 C 36 31.07 31.07 36 25 36 C 18.93 36 14 31.07 14 25 C 14 18.93 18.93 14 25 14 z M 25 16 C 20.04 16 16 20.04 16 25 C 16 29.96 20.04 34 25 34 C 29.96 34 34 29.96 34 25 C 34 20.04 29.96 16 25 16 z">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <div id="navbar" class="navbar relative w-full transition-all duration-500">
        <div class="absolute bg-white w-full h-full top-0 opacity-70"></div>
        <div id="navbar" class="relative container py-4 mx-auto z-30">
            <div class="lg:flex lg:items-center">
                <div class="flex items-center justify-between">
                    <div class="">
                        <a class="text-2xl font-bold text-gray-800 transition-colors duration-300 transform lg:text-3xl hover:text-gray-700 "
                            href="#">
                            <img class="w-[200px] " src="{{ asset('images/logo/logo-southbuton.png') }}" alt="">
                        </a>
                    </div>
                    <!-- Mobile menu button -->
                    <div class="flex md:hidden">
                        <button x-cloak @click="isOpen = !isOpen" type="button"
                            class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600"
                            aria-label="toggle menu">
                            <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                            </svg>

                            <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
                    class="absolute inset-x-0 z-20 flex-1 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-transparent lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:bg-transparent lg:w-auto lg:opacity-100 lg:translate-x-0 lg:flex lg:items-center lg:justify-between">
                    <div class="absolute w-full h-full bg-white opacity-70 -mx-6 md:hidden"></div>
                    <div
                        class="flex flex-col text-gray-600 capitalize font-medium lg:flex lg:px-16 lg:-mx-4 lg:flex-row lg:items-center">
                        <a href="/beranda" 
                            class="mt-2 transition-colors duration-300 transform lg:mt-0 lg:mx-4 hover:text-gray-900">Beranda</a>
                        <a href="/event" 
                            class="mt-2 transition-colors duration-300 transform lg:mt-0 lg:mx-4 hover:text-gray-900">Event</a>
                        <a href="/destinasi" 
                            class="mt-2 transition-colors duration-300 transform lg:mt-0 lg:mx-4 hover:text-gray-900">Destinasi</a>
                        <a href="/kuliner" 
                            class="mt-2 transition-colors duration-300 transform lg:mt-0 lg:mx-4 hover:text-gray-900">Kuliner</a>
                        <a href="/akomodasi" 
                            class="mt-2 transition-colors duration-300 transform lg:mt-0 lg:mx-4 hover:text-gray-900">Akomodasi</a>
                        <a href="/peta-wisata" 
                            class="mt-2 transition-colors duration-300 transform lg:mt-0 lg:mx-4 hover:text-gray-900">Peta
                            Wisata</a>

                    </div>
                    <div
                        class="flex items-center w-full lg:w-auto mx-auto justify-center mt-5 border-solid pt-5 border-t lg:border-0 lg:pt-0 lg:mt-0">
                        <div class="flex items-center space-x-3">
                            @if (Auth::user())
                            <div class="relative" x-data="{ open: false }" x-on:click.outside="open = false">
                                <button class="p-0.5 rounded-full bg-gray-100 hover:bg-teal-500 focus:bg-teal-500"
                                    x-on:click="open = !open">
                                    <img class="rounded-full h-8 w-8" src="{{ auth()->user()->avatarUrl() }}" alt="">
                                </button>
                                <ul class="absolute mt-1 bg-white rounded-md shadow-lg p-3 right-0" x-show="open"
                                    x-transition.opacity>
                                    @hasanyrole('author|admin')
                                    <a href="{{ route('dashboard') }}"
                                        >Dashboard</a>
                                    <a href="">Profil</a>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <a class="" role="menuitem" href={{ route('logout') }}
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            Logout
                                        </a>
                                    </form>
                                    @else
                                    <a href="{{ route('user.profile', [auth()->user()->name, auth()->user()->id] )}}">Profil</a>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <a class="" role="menuitem" href={{ route('logout') }}
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            Logout
                                        </a>
                                    </form>
                                    @endhasanyrole

                                </ul>
                            </div>
                            @else
                            <a href="#_"
                                class="relative inline-flex items-center justify-center px-3 py-1 text-md font-medium tracking-tighter text-white bg-gray-800 rounded-md shadow-md group">
                                <span
                                    class="absolute inset-0 w-full h-full mt-1 ml-1 transition-all duration-300 ease-in-out bg-teal-500 rounded-md group-hover:mt-0 group-hover:ml-0"></span>
                                <span class="absolute inset-0 w-full h-full bg-white rounded-md "></span>
                                <span
                                    class="absolute inset-0 w-full h-full transition-all duration-200 ease-in-out delay-100 bg-teal-500 rounded-md opacity-0 group-hover:opacity-100 "></span>
                                <span
                                    class="relative text-teal-500 transition-colors duration-200 ease-in-out delay-100 group-hover:text-white">Masuk</span>
                            </a>
                            <a href="#_"
                                class="relative inline-flex items-center justify-center px-3 py-1 text-md font-medium tracking-tighter text-white bg-gray-800 rounded-md shadow-md group">
                                <span
                                    class="absolute inset-0 w-full h-full mt-1 ml-1 transition-all duration-300 ease-in-out bg-teal-500 rounded-md group-hover:mt-0 group-hover:ml-0"></span>
                                <span class="absolute inset-0 w-full h-full bg-white rounded-md "></span>
                                <span
                                    class="absolute inset-0 w-full h-full transition-all duration-200 ease-in-out delay-100 bg-teal-500 rounded-md opacity-0 group-hover:opacity-100 "></span>
                                <span
                                    class="relative text-teal-500 transition-colors duration-200 ease-in-out delay-100 group-hover:text-white">Daftar</span>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</nav>
<script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "0";
        } else {
            document.getElementById("navbar").style.top = "-100px";
        }
            prevScrollpos = currentScrollPos;
    }

</script>
<script>

</script>