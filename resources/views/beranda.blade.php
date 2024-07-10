<x-guest-layout class="">
    @section('title', 'Beranda')
    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/css/splide.min.css"
            integrity="sha512-KhFXpe+VJEu5HYbJyKQs9VvwGB+jQepqb4ZnlhUF/jQGxYJcjdxOTf6cr445hOc791FFLs18DKVpfrQnONOB1g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
            .gallery img {
                width: 179px;
                cursor: pointer;
            }

            .thumbnail.is-active {
                background: white;
                color: black;
            }

            .splide__slide.is-active {
                border: none;
                border: 0;
            }

            .thumbnail {
                background: #0000008f;
                color: white;

            }

            .is-active {
                border: none;
            }
        </style>
        <style>
            .zigzag {
                height: 16px;
                background: linear-gradient(45deg, #f3f4f6 25%, transparent 25%) -16px 0,
                    linear-gradient(-45deg, #f3f4f6 25%, transparent 25%) -16px 0,
                    linear-gradient(135deg, #f3f4f6 25%, transparent 25%),
                    linear-gradient(-135deg, #f3f4f6 25%, transparent 25%);
                background-position: -8px 0, -8px 0, 0 0, 0 0;
                background-size: 16px 16px;
            }
        </style>
    @endpush


    <section class="relative w-full h-auto ">
        <section id="main-carousel" class="splide px-4 z-0 w-full max-w-6xl mx-auto !static"
            aria-label="My Awesome Gallery">
            <div class="splide__track static !block h-screen ">
                <ul class="splide__list !h-[650px]  md:!h-[680px] !absolute top-0 left-0 z-[1] w-full">
                    @foreach (get_kanban() as $kanban)
                        <li class="splide__slide">
                            <div class="!absolute z-0 top-0 !bg-fixed bg-cover bg-center bg-no-repeat h-screen w-full"
                                style="background-image: url('{{ asset('storage/kanban') }}/{{ $kanban->image }}');">
                            </div>
                            <div class="px-4 z-0 w-full max-w-6xl mx-auto !static">
                                <div class=" !absolute bottom-[220px] max-w-[600px] text-white ">
                                    <div class="">
                                        <a class="bg-teal-500 px-3 py-1 inline-flex uppercase text-[12px]"
                                            href="{{ $kanban->url }}" target="__blank">Info</a>
                                    </div>
                                    <h2 class="text-4xl font-bold mt-2">
                                        <a href="{{ $kanban->url }}" target="__blank">{{ $kanban->title }}</a>
                                    </h2>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="relative z-[1] h-auto">
                <div class=" absolute w-full !max-w-6xl h-auto mx-auto ">
                    <section id="thumbnails" class="splide absolute bottom-2 left-0 right-0"
                        aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel.">
                        <div class="splide__track ">
                            <ul class="splide__list thumbnails font-bold">
                                @foreach ($kanbans as $kanban)
                                    <li class="splide__slide thumbnail !border-none">
                                        <div class=" inline-block">
                                            <div class="text-[14px] p-[20px] min-h[80px] block ">
                                                <h3>
                                                    <span>{!! Str::limit($kanban->title, 60, ' ...') !!}</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
                </div>
            </div>

        </section>
        <!-- component -->
        <div class="max-w-6xl justify-center mx-auto text-center border-b-2 pb-4 z-50 mt-3">
            <p class="text-3xl font-extrabold leading-none text-gray-800 py-4">Cerita Pengunjung</p>

            <ul class="flex space-x-6 font-serif mx-auto justify-center">
                @foreach (get_feed() as $key => $item)
                    <li class="flex flex-col items-center space-y-1 ">
                        <div class="bg-gradient-to-tr from-yellow-500 to-fuchsia-600 p-0.5 rounded-full">
                            <div class=" bg-white block rounded-full hover:-rotate-6 transform transition">
                                <img class="h-10 w-10 rounded-full cursor-pointer object-cover"
                                    src="{{ asset('storage/story') }}/{{ $item->story_image }}" alt="cute kitty"
                                    onclick="lightbox({{ $key }})" />
                            </div>
                        </div>
                        <p class="text-xs">
                            {{ $item->user->name }}
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>
        <!--start-->
        <div>
            <div style="display:none;">
                <div id="ninja-slider">
                    <div class="slider-inner">
                        <ul>
                            @foreach (get_feed() as $key => $item)
                                <li>
                                    <a class="ns-img" href="{{ asset('storage/story') }}/{{ $item->story_image }}"></a>
                                    <div class="caption">
                                        <h3>{{ $item->title }}</h3>
                                        <p>{{ $item->description }}
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div id="fsBtn" class="fs-icon" title="Expand/Close"></div>
                    </div>
                </div>
            </div>
        </div>

        <!--end-->
        <div class="relative mx-auto  w-full mt-2">
            <div class="relative w-full flex flex-wrap z-[1] h-[20px]">
                <div class="relative  bg-inherit flex px-[15px] mb-3 mx-auto max-w-5xl w-full ">
                </div>
            </div>
            <div class="relative left-0 right-0 z-0 bg-transparent max-w-5xl text-center mx-auto">
                <h2 class="font-bold text-3xl">
                    #AyomikeBusel
                </h2>
                <p class="text-sm mt-3">Selamat Datang di Situs Resmi Dinas Pariwisata dan Ekonomi Kreatif Buton
                    Selatan
                </p>

            </div>

            <div class="mt-5 flex justify-center mx-auto bg-teal-500 w-[100px] zigzag">
            </div>
        </div>

        <section>
            <div class="max-w-6xl px-6 xl:px-0 mx-auto mt-10 z-[100]">
                <div class="relative border border-solid border-slate-500 p-4">
                    <div class="relative md:flex text-center items-center md:space-x-4 text-xs">
                        <a href="/event-festival">
                            <div class="flex justify-center mx-auto md:mx-0 mb-2 md:mb-0">
                                <h2 class="px-3 py-2 bg-black hover:bg-teal-500 text-white font-bold uppercase">
                                    Agenda Event</h2>
                            </div>
                        </a>
                        <div class="relative w-full">
                            <div id="event_slide" class="splide md:mx-0">
                                <div class="splide__track md:text-start">
                                    <div class="splide__list">
                                        @forelse ($event as $e)
                                            <div class="splide__slide items-center flex">
                                                <a href="{{ route('detail-event', $e->slug) }}"
                                                    class="uppercase font-bold hover:text-teal-500 w-full">
                                                    {{ $e->title }} ({{ $e->date_time }})
                                                </a>
                                            </div>
                                        @empty
                                            <div class="splide__slide items-center flex">
                                                <a href="#"
                                                    class="uppercase font-medium hover:text-teal-500 w-full">
                                                    No Data
                                                </a>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="max-w-6xl px-6 xl:px-0 mx-auto mt-5">
                <div class="lg:flex lg:flex-wrap space-y-4 md:space-y-0">
                    <div class="w-full lg:w-2/3 pr-0 lg:pr-2 mb-2 lg:mb-0">
                        <div class="event-swiper">
                            <div id="event-slider" class="splide">
                                <div class="splide__track">
                                    <div class="splide__list">
                                        @forelse ($event as $e)
                                            <div class="splide__slide group">
                                                <a href="{{ route('detail-event', $e->slug) }}">
                                                    <img class="h-[420px] 
                                                object-cover object-center block w-full shadow-md"
                                                        src="
                                                {{ asset('storage/event-festival') }}/{{ $e->image_featured }}"
                                                        alt="">
                                                </a>

                                                <div
                                                    class="absolute bottom-0 w-full h-full opacity-80 bg-gradient-to-t from-black to-transparent">
                                                </div>
                                                <a class="w-full mx-auto absolute text-center bottom-5 p-4 text-white z-10"
                                                    href="{{ route('detail-event', $e->slug) }}">
                                                    <div class="mx-auto mb-2">
                                                        <span
                                                            class=" font-bold text-lg px-3 py-1 rounded-full bg-teal-500">Event</span>
                                                    </div>
                                                    <h1 class="text-2xl font-bold uppercase">{{ $e->title }}
                                                    </h1>
                                                    <span
                                                        class="text-xs">{{ \Carbon\Carbon::parse($e->date_time)->translatedFormat('l, d F Y') }}</span>

                                                </a>
                                            </div>
                                        @empty
                                            <div class="splide__slide">
                                                <img class="h-[420px] 
                                                          object-cover object-center block w-full"
                                                    src="
                                                                {{ asset('images/background/background1.jpg') }}"
                                                    alt="">
                                                <div
                                                    class="absolute bottom-0 w-full h-full opacity-40 bg-gradient-to-t from-black to-transparent">
                                                </div>
                                                <div class="absolute text-center p-4 text-white z-10">
                                                    <h1 class="text-2xl font-bold">Event
                                                    </h1>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                    <div class="splide__arrows splide__arrows--ltr">
                                        <button class="splide__arrow splide__arrow--prev rounded-full bg-teal-500 p-5"
                                            type="button" aria-label="Previous slide"
                                            aria-controls="splide01-track">
                                            <i class="fas fa-arrow-left text-md text-white"></i>
                                        </button>
                                        <button class="splide__arrow splide__arrow--next rounded-full bg-teal-500 p-5"
                                            type="button" aria-label="Next slide" aria-controls="splide01-track">
                                            <i class="fas fa-arrow-right text-md text-white"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/3 border border-solid border-slate-500 p-4">
                        <h1 class="text-3xl font-bold mb-4">
                            Berita South Buton
                        </h1>
                        <div class="space-y-6">
                            @foreach ($newberita as $nb)
                                <div class="text-sm space-y-2">
                                    <a href="{{ route('getberita', $nb->slug) }}" class="hover:text-teal-500">
                                        <h3>{{ $nb->title }}
                                        </h3>
                                    </a>
                                    <div class="flex items-center text-xs space-x-2">
                                        <h4 class="px-1.5 py-0.5 bg-black text-white">Berita</h4>
                                        <p class="text-gray-500">
                                            {{ \Carbon\Carbon::parse($nb->created_at)->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-6">
                            <a href="/berita"
                                class="flex text-center py-2 justify-center bg-black text-white hover:bg-teal-500">
                                <h1>Info Lainnya</h1>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-teal-500 py-10 my-12">
            <div class="max-w-6xl px-6 xl:px-0 mx-auto">
                <div class="w-full mb-10">
                    <div class="flex items-center justify-between">
                        <div class="relative flex text-white font-bold text-3xl uppercase items-end justify-start">
                            <h1 class="mb-[2px]">Destinasi</h1>
                            <p class="absolute ml-3 text-5xl opacity-50">Wisata</span>
                        </div>

                        <div>
                            <a href="/id/wisata"
                                class="relative inline-flex items-center justify-start py-3 pl-4 pr-12 overflow-hidden font-semibold font-sans text-sm text-white transition-all duration-150 ease-in-out hover:pl-10 hover:pr-6  group">
                                <span
                                    class="absolute bottom-0 left-0 w-full h-1 transition-all duration-150 ease-in-out bg-white group-hover:h-full"></span>
                                <span class="absolute right-0 pr-4 duration-200 ease-out group-hover:translate-x-12">
                                    <svg class="w-5 h-5 text-white group-hover:text-teal-500" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </span>
                                <span
                                    class="absolute left-0 pl-2.5 -translate-x-12 group-hover:translate-x-0 ease-out duration-200">
                                    <svg class="w-5 h-5 text-white group-hover:text-teal-500" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </span>
                                <span
                                    class="relative w-full text-left transition-colors duration-200 ease-in-out group-hover:text-teal-500">Destinasi
                                    Lainnya</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="grid lg:grid-cols-3 2xl:grid-cols-3 grid-cols-1 gap-1">
                    @foreach ($wisata as $destinasi)
                        <a href="{{ route('detail-post', [$destinasi->category->slug, $destinasi->slug]) }}"
                            class="w-full mx-auto shadow-xl bg-cover bg-center transform duration-500 hover:-translate-y-2 cursor-pointer group"
                            style="background-image: url({{ asset('storage/destinasi') }}/{{ $destinasi->image_featured }});">
                            <div
                                class="relative p-8 pt-24 min-h-[220px] w-full bg-black bg-opacity-20 flex flex-wrap flex-col hover:bg-opacity-75 transform duration-300">
                                <div class="absolute bottom-0 mb-4">
                                    <h1 class="text-white text-md uppercase font-bold mb-2 transform duration-300">
                                        {{ $destinasi->name }}
                                    </h1>
                                    <div class="flex space-x-2 items-center">
                                        <div
                                            class="text-white text-xs py-0.5 px-1 flex bg-teal-500 transform duration-300">
                                            <p>{{ $destinasi->category->title }}</p>
                                        </div>
                                        <p class="text-white text-xs">
                                            {{ \Carbon\Carbon::parse($destinasi->created_at)->format('d/m/Y') }}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="my-12">
            <div class="max-w-6xl px-6 xl:px-0 pb-10 mx-auto mt-5 border-b-2 border-solid">
                <div class="lg:flex lg:space-x-4 space-y-4 lg:space-y-0">
                    <div class="w-full lg:w-1/2">
                        <div class="">
                            <a href="/id/kuliner"
                                class="relative px-6 py-3 font-bold text-black w-full flex group text-center justify-center">
                                <span
                                    class="absolute inset-0 w-full h-full transition duration-300 ease-out transform -translate-x-2 -translate-y-2 bg-teal-300 group-hover:translate-x-0 group-hover:translate-y-0"></span>
                                <span class="absolute inset-0 w-full h-full border-4 border-black"></span>
                                <span
                                    class="relative text-[24px] md:text-[24px] lg:text-3xl font-bold uppercase">kuliner</span>
                            </a>
                        </div>
                        @foreach ($kuliner as $items)
                            @foreach ($items->destination as $index => $item)
                                @if ($loop->first)
                                    <div class="mt-4">
                                        <a href="{{ route('detail-post', [$item->category->slug, $item->slug]) }}"
                                            class="mx-auto relative max-w-full group cursor-pointer hover:text-teal-500">
                                            <div class="overflow-hidden">
                                                <img class="w-full h-[240px] object-cover transform hover:scale-110 duration-200 shadow-md"
                                                    src="{{ asset('storage/destinasi') }}/{{ $item->image_featured }}"
                                                    alt="">
                                            </div>
                                            <div class="my-auto">
                                                <h1 class="uppercase text-lg font-semibold mt-2">{{ $item->name }}
                                                </h1>
                                                <p class="text-sm text-gray-400 leading-relaxed">
                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                                </p>
                                                <p
                                                    class="text-sm overflow-hidden text-gray-600 mt-2 leading-relaxed h-16 ...">
                                                    {!! \Illuminate\Support\Str::limit($item->description, 150) !!}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                                @if ($index)
                                    <div class="mt-2">
                                        <a href="{{ route('detail-post', [$item->category->slug, $item->slug]) }}"
                                            class="flex mx-auto relative max-w-full group cursor-pointer hover:text-teal-500">
                                            <div class="w-1/3 overflow-hidden mr-2">
                                                <img class="w-full h-[100px] object-cover transform hover:scale-110 duration-200"
                                                    src="{{ asset('storage/destinasi') }}/{{ $item->image_featured }}"
                                                    alt="">
                                            </div>
                                            <div class="w-2/3">
                                                <h1 class="uppercase text-md font-semibold">{{ $item->name }}</h1>
                                                <p class="text-xs text-gray-400 leading-relaxed">
                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                                </p>
                                                <p
                                                    class="text-xs overflow-hidden text-gray-600 mt-2 leading-relaxed h-10 ...">
                                                    {!! \Illuminate\Support\Str::limit($item->description, 100) !!}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                    <div class="w-full lg:w-1/2">
                        <div class="">
                            <a href="/id/hotel-penginapan"
                                class="relative px-6 py-3 font-bold text-black w-full flex group text-center justify-center">
                                <span
                                    class="absolute inset-0 w-full h-full transition duration-300 ease-out transform -translate-x-2 -translate-y-2 bg-teal-300 group-hover:translate-x-0 group-hover:translate-y-0"></span>
                                <span class="absolute inset-0 w-full h-full border-4 border-black"></span>
                                <span
                                    class="relative text-[24px] md:text-[24px] lg:text-3xl font-bold uppercase">Akomodasi</span>
                            </a>
                        </div>
                        @foreach ($akomodasi as $items)
                            @foreach ($items->destination as $index => $item)
                                @if ($loop->first)
                                    <div class="mt-4">
                                        <a href="{{ route('detail-post', [$item->category->slug, $item->slug]) }}"
                                            class="mx-auto relative max-w-full group cursor-pointer hover:text-teal-500">
                                            <div class="overflow-hidden">
                                                <img class="w-full h-[240px] object-cover transform hover:scale-110 duration-200 shadow-md"
                                                    src="{{ asset('storage/destinasi') }}/{{ $item->image_featured }}"
                                                    alt="">
                                            </div>
                                            <div class="my-auto">
                                                <h1 class="uppercase text-lg font-semibold mt-2">{{ $item->name }}
                                                </h1>
                                                <p class="text-sm text-gray-400 leading-relaxed">
                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                                </p>
                                                <p
                                                    class="text-sm overflow-hidden text-gray-600 mt-2 leading-relaxed h-16 ...">
                                                    {!! \Illuminate\Support\Str::limit($item->description, 150) !!}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                                @if ($index)
                                    <div class="mt-2">
                                        <a href="{{ route('detail-post', [$item->category->slug, $item->slug]) }}"
                                            class="flex mx-auto relative max-w-full group cursor-pointer hover:text-teal-500">
                                            <div class="w-1/3 overflow-hidden mr-2">
                                                <img class="w-full h-[100px] object-cover transform hover:scale-110 duration-200"
                                                    src="{{ asset('storage/destinasi') }}/{{ $item->image_featured }}"
                                                    alt="">
                                            </div>
                                            <div class="w-2/3">
                                                <h1 class="uppercase text-md font-semibold">{{ $item->name }}</h1>
                                                <p class="text-xs text-gray-400 leading-relaxed">
                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                                </p>
                                                <p
                                                    class="text-xs overflow-hidden text-gray-600 mt-2 leading-relaxed h-10 ...">
                                                    {!! \Illuminate\Support\Str::limit($item->description, 100) !!}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="section-video my-12">
            <div class="">
                <div class="mx-auto max-w-6xl px-6 xl:px-0">
                    <h1 class="text-center section-heading text-3xl font-light font-aclonica">Video Galery</h1>

                    <div class="mt-2 flex justify-center mx-auto bg-teal-500 w-[80px] zigzag">
                    </div>
                    <div class="flex w-full justify-between items-center border-b mb-5 pb-2">
                        <a href="{{ route('video-galery') }}">
                            <div class="flex items-center">
                                <div
                                    class="border-2 rounded-full flex mr-1 bg-white text-black items-center border-black text-center justify-center p-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                    </svg>
                                </div>
                                <span class="font-bold text-md">Video</span>
                            </div>
                        </a>
                        <div>
                            <a href="{{ route('video-galery') }}"
                                class="relative inline-flex items-center justify-start py-3 pl-4 pr-12 overflow-hidden font-semibold font-sans text-sm text-black transition-all duration-150 ease-in-out hover:pl-10 hover:pr-6  group">
                                <span
                                    class="absolute bottom-0 left-0 w-full h-1 transition-all duration-150 ease-in-out bg-black group-hover:bg-teal-500 group-hover:h-full"></span>
                                <span class="absolute right-0 pr-4 duration-200 ease-out group-hover:translate-x-12">
                                    <svg class="w-5 h-5 text-black group-hover:text-white" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </span>
                                <span
                                    class="absolute left-0 pl-2.5 -translate-x-12 group-hover:translate-x-0 ease-out duration-200">
                                    <svg class="w-5 h-5 text-black group-hover:text-white" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </span>
                                <span
                                    class="relative w-full text-left transition-colors duration-200 ease-in-out group-hover:text-white">Video
                                    Lainnya</span>
                            </a>
                        </div>
                    </div>


                    <livewire:video-modal>
                </div>

            </div>



        </section>

    </section>

    <!--
      <section>
            <div class="bg-white w-full mt-5">
                  <div class="w-full mx-auto text-center lg:text-left">
                        <div class="">
                              <h1 class="mt-12 mx-8 text-4xl font-bold">Video Dokumentasi</h1>
                              <div class="journey glide">
                                    <div class="glide__track" data-glide-el="track">
                                          <ul class="glide__slides flex ">
                                                <li onclick="Livewire.emit('openModal', 'video-modal')"
                                                      class="glide__slide flex pt-12">
                                                      <div
                                                            class="flex flex-col items-center justify-center w-full mx-auto">
                                                            <div
                                                                  class="w-full h-auto rounded-md shadow-md hover:shadow-xl delay-100 transition-all">
                                                                  <x-embed url="https://youtu.be/R4L0xJCqFxY" />
                                                            </div>
                                                            <div class="w-56 mt-2 overflow-hidden md:w-64">
                                                                  <h3
                                                                        class="py-2 font-bold tracking-wide text-center text-gray-800 uppercase">
                                                                        Judul</h3>
                                                            </div>
                                                      </div>
                                                </li>
                                                <li onclick="Livewire.emit('openModal', 'video-modal')"
                                                      class="glide__slide flex pt-12">
                                                      <div
                                                            class="flex flex-col items-center justify-center w-full mx-auto">
                                                            <div
                                                                  class="w-full h-auto rounded-md shadow-md hover:shadow-xl delay-100 transition-all">
                                                                  <x-embed url="https://youtu.be/R4L0xJCqFxY" />
                                                            </div>
                                                            <div class="w-56 mt-2 overflow-hidden md:w-64">
                                                                  <h3
                                                                        class="py-2 font-bold tracking-wide text-center text-gray-800 uppercase">
                                                                        Judul</h3>
                                                            </div>
                                                      </div>
                                                </li>
                                                <li onclick="Livewire.emit('openModal', 'video-modal')"
                                                      class="glide__slide flex pt-12">
                                                      <div
                                                            class="flex flex-col items-center justify-center w-full mx-auto">
                                                            <div
                                                                  class="w-full h-auto rounded-md shadow-md hover:shadow-xl delay-100 transition-all">
                                                                  <x-embed url="https://youtu.be/R4L0xJCqFxY" />
                                                            </div>
                                                            <div class="w-56 mt-2 overflow-hidden md:w-64">
                                                                  <h3
                                                                        class="py-2 font-bold tracking-wide text-center text-gray-800 uppercase">
                                                                        Judul</h3>
                                                            </div>
                                                      </div>
                                                </li>
                                          </ul>
                                    </div>
                                    <div class="glide__arrows" data-glide-el="controls">
                                          <button
                                                class="glide__arrow glide__arrow--left rounded-full bg-teal-400 border-teal-300"
                                                data-glide-dir="<">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                      viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                      <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                          </button>
                                          <button
                                                class="glide__arrow glide__arrow--right rounded-full bg-teal-400 border-teal-300"
                                                data-glide-dir=">">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                      viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                      <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M9 5l7 7-7 7">
                                                      </path>
                                                </svg>
                                          </button>
                                    </div>
                              </div>

                        </div>
                  </div>
            </div>
      </section>
-->
    @push('scripts')
        <script>
            function lightbox(idx) {
                //show the slider's wrapper: this is required when the transitionType has been set to "slide" in the ninja-slider.js
                var ninjaSldr = document.getElementById("ninja-slider");
                ninjaSldr.parentNode.style.display = "block";

                nslider.init(idx);

                var fsBtn = document.getElementById("fsBtn");
                fsBtn.click();
            }

            function fsIconClick(isFullscreen, ninjaSldr) { //fsIconClick is the default event handler of the fullscreen button
                if (isFullscreen) {
                    ninjaSldr.parentNode.style.display = "none";
                }
            }
        </script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js"
            integrity="sha512-4TcjHXQMLM7Y6eqfiasrsnRCc8D/unDeY1UGKGgfwyLUCTsHYMxF7/UHayjItKQKIoP6TTQ6AMamb9w2GMAvNg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {

                var event_slide = new Splide('#event_slide', {
                    type: 'fade',
                    rewind: true,
                    pagination: false,
                    arrows: false,
                    autoplay: true,
                    interval: 1500,
                    pauseOnHover: true
                }).mount();

                var event_slider = new Splide('#event-slider', {
                    type: 'fade',
                    rewind: true,
                    pagination: false,
                    arrows: true,
                    autoplay: true,
                    interval: 5000,
                    pauseOnHover: true
                }).mount();

                var splide = new Splide('#main-carousel', {
                    type: 'fade',
                    rewind: true,
                    pagination: false,
                    arrows: false,
                });

                var thumbnails_carousel = new Splide('#thumbnails', {
                    gap: 10,
                    rewind: true,
                    rewindByDrag: true,
                    pagination: false,
                    isNavigation: true,
                    arrows: false,
                    perPage: 4,
                    breakpoints: {
                        1200: {
                            perPage: 3,
                        },
                        640: {
                            perPage: 2,
                        },
                    },
                });

                var thumbnails = document.getElementsByClassName('thumbnail');
                var current;


                for (var i = 0; i < thumbnails.length; i++) {
                    initThumbnail(thumbnails[i], i);
                }


                function initThumbnail(thumbnail, index) {
                    thumbnail.addEventListener('click', function() {
                        splide.go(index);
                    });
                }


                splide.on('mounted move', function() {
                    var thumbnail = thumbnails[splide.index];


                    if (thumbnail) {
                        if (current) {
                            current.classList.remove('is-active');
                        }


                        thumbnail.classList.add('is-active');
                        current = thumbnail;
                    }
                });

                splide.sync(thumbnails_carousel);
                splide.mount();
                thumbnails_carousel.mount();
            });
        </script>
    @endpush
    </x-guest-layouts>
