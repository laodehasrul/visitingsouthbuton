<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'visitingsouthbuton') }} | @yield('title')</title>
    @stack('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Share CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type='text/javascript'
        src='https://platform-api.sharethis.com/js/sharethis.js#property=61b822604402240019083130&product=inline-share-buttons'
        async='async'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <link href="{{ asset('/ninjaslider/ninja-slider.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('/ninjaslider/ninja-slider.js') }}" type="text/javascript"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <x-embed-styles />

</head>

<body class=" bg-gray-100 font-sans antialiased">
    <!-- Page Content -->
    <div class=" ">
        @livewire('header')
    </div>
    <x-modal-search>

    </x-modal-search>
    <main class="font-poppins">

        {{ $slot }}
    </main>
    @auth
        <div class="fixed bottom-[80px] right-5 z-50 bg-black/50 text-white p-2 rounded-lg">
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <div class="relative">
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 translate-x-20"
                        x-transition:enter-end="transform opacity-100 translate-x-0"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 translate-x-0"
                        x-transition:leave-end="transform opacity-0 translate-x-20"
                        class="bottom-0 origin-top-right absolute left-0 mb-2 -ml-2 w-48 rounded-md shadow-lg">
                        <div class="py-1 rounded-md bg-white shadow-xs relative">
                            @hasanyrole('author|admin|super-admin')
                                <a href="{{ route('admin.profile') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150">
                                    Profil</a>
                                <a href="{{ route('dashboard') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150">
                                    Dashboard</a>
                                <a href="{{ route('settings') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150">Settings</a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a href={{ route('logout') }}
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150">Logout</a>
                                </form>
                            @else
                                <a href="{{ route('user.profile', [auth()->user()->name, auth()->user()->id]) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150">
                                    Profil</a>
                                <a href="{{ route('user.feed', [auth()->user()->name, auth()->user()->id]) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150">Feed</a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a href={{ route('logout') }}
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150">Logout</a>
                                </form>
                            @endhasanyrole
                        </div>
                    </div>
                </div>
                <div>
                    <button @click="open = !open"
                        class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:shadow-solid transition ease-in-out duration-150">
                        <img class="inline-block h-8 w-8 rounded-full" src="{{ auth()->user()->avatarUrl() }}"
                            alt="">
                        <div class="ml-3">
                            <p class="text-sm leading-5 font-medium text-white group-hover:text-gray-900">
                                {{ auth()->user()->name }}
                            </p>
                            <p
                                class="text-xs text-left leading-4 font-medium text-gray-50 group-hover:text-white transition ease-in-out duration-150">
                                Lihat profil
                            </p>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    @endauth
    @auth
        @hasrole('user|author')
            <div class="fixed bottom-10 md:bottom-4 right-1/2 z-50 bg-black/50 text-white p-2 rounded-full">
                <div x-data="{ open: false }" @mouseleave="open = false" class="relative">
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 -translate-x-20"
                        x-transition:enter-end="transform opacity-100 translate-x-0"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 translate-x-0"
                        x-transition:leave-end="transform opacity-0 -translate-x-20"
                        class="bg-black/50 -bottom-1 origin-top-left absolute w-24 left-9 items-center p-2 rounded-md shadow-lg">
                        <div
                            class="flex w-full relative text-xs rounded-full text-white focus:outline-none focus:shadow-solid transition ease-in-out duration-150 ">
                            Bagikan Cerita
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('user.feed.create',[auth()->user()->name, auth()->user()->id]) }}" @mouseover="open = true"
                            class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:shadow-solid transition ease-in-out duration-150">
                            <svg class="inline-block h-5 w-5 rounded-full" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                    clip-rule="evenodd" />
                            </svg>

                        </a>
                    </div>
                </div>
            </div>
        @else
        @endhasrole
    @endauth

    <div x-data="{ show: false }" x-on:scroll.window="show = window.pageYOffset >= 200" class="fixed bottom-8 right-8">
        <button x-show="show" x-transition x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})"
            class="shadow-lg bg-white p-2 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="m11 7.825l-4.9 4.9q-.3.3-.7.288t-.7-.313q-.275-.3-.288-.7t.288-.7l6.6-6.6q.15-.15.325-.212T12 4.425q.2 0 .375.063t.325.212l6.6 6.6q.275.275.275.688t-.275.712q-.3.3-.713.3t-.712-.3L13 7.825V19q0 .425-.288.713T12 20q-.425 0-.713-.288T11 19V7.825Z" />
            </svg>
        </button>
    </div>
    @livewire('footer')
    @stack('modals')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"
        integrity="sha512-Ysw1DcK1P+uYLqprEAzNQJP+J4hTx4t/3X2nbVwszao8wD+9afLjBQYjz7Uk4ADP+Er++mJoScI42ueGtQOzEA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function sidebar() {
            return {
                sidebarOpen: false,
                sidebarProductMenuOpen: false,
                openSidebar() {
                    this.sidebarOpen = true
                },
                closeSidebar() {
                    this.sidebarOpen = false
                },
                sidebarProductMenu() {
                    if (this.sidebarProductMenuOpen === true) {
                        this.sidebarProductMenuOpen = false
                        window.localStorage.setItem('sidebarProductMenuOpen', 'close');
                    } else {
                        this.sidebarProductMenuOpen = true
                        window.localStorage.setItem('sidebarProductMenuOpen', 'open');
                    }
                },
                checkSidebarProductMenu() {
                    if (window.localStorage.getItem('sidebarProductMenuOpen')) {
                        if (window.localStorage.getItem('sidebarProductMenuOpen') === 'open') {
                            this.sidebarProductMenuOpen = true
                        } else {
                            this.sidebarProductMenuOpen = false
                            window.localStorage.setItem('sidebarProductMenuOpen', 'close');
                        }
                    }
                },
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $(window).scroll(function(e) {
                var $el = $('.navbar');
                var isPositionFixed = ($el.css('position') == 'fixed');
                if ($(this).scrollTop() > 185) {
                    $('.navbar').css({
                        'z-index': '50',
                        'opacity': '1'
                    });
                    document.getElementById("navbar").style.top = "0";
                }
                if ($(this).scrollTop() < 185) {
                    $('.navbar').css({
                        'z-index': '-1000',
                        'opacity': '0'
                    });
                    document.getElementById("navbar").style.top = "-200px";
                }
            });
        });
    </script>
    <script type="text/javascript">
        var mySwiper = new Swiper('.swiper-container', {
            // Optional parameters
            // direction: 'vertical',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });
        document.addEventListener('livewire:update', function() {
            if (mySwiper) {
                mySwiper.destroy(true, true);
            }
            mySwiper = new Swiper('.swiper-container', {
                // Optional parameters
                // direction: 'vertical',
                loop: true,

                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

                // And if we need scrollbar
                scrollbar: {
                    el: '.swiper-scrollbar',
                },
            });
        });
    </script>

    @stack('scripts')
    @stack('js')
    <script>
        window.addEventListener('error', function(e) {
            Swal.fire({
                html: 'Anda tidak memiliki akses ke fitur ini! Silahkan Login/Daftar terlebih dahulu.',
                text: event.detail.text,
                toast: true,
                position: 'center',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                icon: 'info',
                timer: 3000
                
            });
        });
        window.addEventListener('swal:modal', event => {
            Swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
                timer: 1500
            });
        });
        window.addEventListener('swalpopup', function(e) {
            Swal.fire(e.detail);
        });
        window.addEventListener('swal:confirm', event => {
            Swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('delete', event.detail.id);
                    Swal.fire(
                        'Deleted!',
                        'Your Account has been deleted.',
                        'success'
                    )
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    @livewireScripts
</body>

</html>
