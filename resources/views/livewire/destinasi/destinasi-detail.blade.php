@push('js')
    <script>
        Livewire.on('comment_store', commentId => {
            var commentScroll = document.getElementById('comment-' + commentId);
            commentScroll.scrollIntoView({
                behavior: 'smooth'
            }, true);
        })
    </script>
@endpush
@section('title', "Destinasi ". $category->title)
<section class="relative bg-white">
    <div class="relative w-full h-auto">
        <div class="relative w-full bg-cover bg-center">
            <div class="absolute bg-black/30 w-full h-[400px]"></div>
            <img class="w-full h-[400px] object-cover object-center"
                src="{{ asset('storage/destinasi') }}/{{ $post->image_featured }}" alt="">
            <div class="absolute z-10 w-full mx-auto bottom-0 pb-5 md:pb-10 mb-10 text-center">
                <div class="flex flex-col items-center mx-auto text-center h-auto text-white">
                    <div class="uppercase text-2xl font-semibold lg:text-3xl px-10">
                        <h1>{{ $post->name }}</h1>
                    </div>
                    <div class="max-w-4xl pt-5 text-md lg:text-[20px]">
                        <h2>{{ $post->description }}</h2>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-200">
        <div
            class="max-w-6xl px-6 xl:px-0 flex items-center py-4 mx-auto overflow-y-auto text-xs md:text-sm lg:text-md whitespace-nowrap">
            <a href="#" class="text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </a>
            <span class="mx-5 text-gray-500 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>
            <a href="{{ route('category', $category->slug) }}" class="text-gray-600 hover:underline capitalize">
                {{ $category->title }}
            </a>

            <span class="mx-5 text-gray-500 rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>

            <a href="#" class="text-teal-600 hover:underline capitalize">
                {{ $post->name }}
            </a>
        </div>
    </div>
    <div class="text-center mt-12">
        <p class="max-w-lg mx-auto justify-center mt-4 text-gray-500">
        </p>
    </div>
    <div class="max-w-6xl px-6 xl:px-0 py-10 mx-auto">
        <div class="lg:flex lg:-mx-6">
            <div class="flex-initial lg:w-[70%] lg:px-6">
                @if ($galeries->count() != 0)
                    <div class="galery border border-solid shadow-xl space-y-2 bg-black">
                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                            class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                @foreach ($galeries as $item)
                                    <div class="swiper-slide">
                                        <img class="object-cover object-center " src="{{ asset('storage/destinasi/galery') }}/{{ $item->image_galery }}" />
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach ($galeries as $item)
                                    <div class="swiper-slide thumbnail">
                                        <img src="{{ asset('storage/destinasi/galery') }}/{{ $item->image_galery }}" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    <img class="object-cover object-center w-full h-80 xl:h-[28rem] rounded-xl shadow-md"
                        src="{{ asset('storage/destinasi') }}/{{ $post->image_featured }}" alt="">
                @endif



                <div class="pb-12">
                    <div class="">
                        <div class="flex items-center my-6 justify-between">
                            <div class="flex items-center">
                                @if ($post->user->profile_photo_path != null)
                                    <img class="object-cover object-center w-10 h-10 rounded-full"
                                        src="{{ asset('storage/profile/avatar') }}/{{ $post->user->profile_photo_path }}"
                                        alt="">
                                @else
                                    <img class="object-cover object-center w-10 h-10 rounded-full"
                                        src="{{ asset('assets/user-default.png') }}" alt="">
                                @endif

                                <div class="mx-4">
                                    <h1 class="text-sm text-gray-700">{{ $post->user->name }}
                                    </h1>
                                    <p class="text-sm text-gray-500">rolename</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="flex items-center">
                                    <div
                                        class="inline-flex items-center justify-center w-10 h-10 text-gray-500 font-bold transition-all rounded-full focus:shadow-outline">
                                        @livewire('destinasi.vote', ['getdestination' => $post], key($post->id))
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <button
                                        class="inline-flex items-center justify-center w-10 h-10 font-semibold text-gray-400 transition-all rounded-full focus:shadow-outline">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                    </button>
                                    <span
                                        class="font-semibold text-gray-400 text-xs ml-1">{{ $post->viewer }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <article class="prose text-sm text-justify max-w-4xl my-12">
                        {!! $post->content !!}
                    </article>

                    <div>
                        <div class="h-[400px] rounded-md shadow-md dark:shadow-teal-400" id="map"></div>
                    </div>
                </div>
                <div class="flex justify-between items-center font-semibold border-t border-solid pt-12 mb-12">
                    @if (!is_null($previous))
                        <a href="{{ route('detail-post', [$previous->category->slug, $previous->slug]) }}">
                            <div class="text-left">
                                <p class="text-xs text-gray-500">Previous Article</p>
                                <p class="hover:text-red-400">{{ $previous->name }}</p>
                            </div>
                        </a>
                    @else
                        <button class="rotate-180">
                            <svg class="h-6 w-6 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </button>
                    @endif
                    @if (!is_null($next))
                        <a href="{{ route('detail-post', [$next->category->slug, $next->slug]) }}">
                            <div class="text-right">
                                <p class="text-xs text-gray-500">Next Article</p>
                                <p class="hover:text-red-400">{{ $next->name }}</p>
                            </div>
                        </a>
                    @else
                        <button>
                            <svg class="h-6 w-6 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </button>
                    @endif
                </div>
                <div class="border border-solid rounded-md p-4">
                    @livewire('destinasi.comment', ['id' => $post->id])
                </div>
            </div>
            <div class="relative w-full md:w-[30%]">
                <div class="relative min-h-[1px] h-full px-4">
                    <div class="sticky w-full top-0 bg-white">
                        <div class="relative">
                            <div class="text-xl font-bold flex items-center mb-5">
                                <h1 class="w-full">Destinasi Populer</h1>
                                <div class="bg-gray-500 h-1 w-full"></div>
                            </div>
                            <ul class="relative">
                                @foreach (get_wisata() as $index => $items)
                                    @if ($loop->first)
                                        <li class="group border-b-[3px] pb-4">
                                            <div class="rounded-md">
                                                <a
                                                    href="{{ route('detail-post', [$items->category->slug, $items->slug]) }}">
                                                    <img class="rounded-md w-full h-[350px] lg:h-auto object-cover min-h-[200px] min-w-[350px]"
                                                        src="{{ asset('storage/destinasi') }}/{{ $items->image_featured }}"
                                                        alt="">
                                                </a>
                                            </div>
                                            <h3 class="flex items-start text-xl font-bold mt-2 leading-none">
                                                <a href="{{ route('detail-post', [$items->category->slug, $items->slug]) }}"
                                                    class="flex">
                                                    <div class="w-full mr-2 lg:w-[80%]">
                                                        <p
                                                            class="group-hover:text-teal-500 transform transition-all delay-100 ease-in-out">
                                                            {{ $items->name }}</p>
                                                        <p class="text-sm text-gray-500 font-normal">
                                                            {{ $items->description }}</p>
                                                    </div>

                                                    <span
                                                        class="border-l pl-2 lg:w-[20%] items-start justify-start text-gray-400 text-2xl mx-auto text-center">0{{ $index + 1 }}</span>
                                                </a>

                                            </h3>
                                        </li>
                                    @endif
                                    @if ($index)
                                        <li class="group mt-4">
                                            <h3 class="flex items-start text-md font-semibold mt-2 leading-none">
                                                <a href="{{ route('detail-post', [$items->category->slug, $items->slug]) }}"
                                                    class="relative flex w-auto h-auto">
                                                    <div
                                                        class="relative items-start justify-start text-md text-start mr-4">
                                                        <p
                                                            class="inline-flex p-3 bg-gray-200 rounded-full group-hover:text-white group-hover:bg-teal-600 transform transition-all delay-100 ease-in-out">
                                                            0{{ $index + 1 }}</p>
                                                    </div>
                                                    <div class="">
                                                        <p
                                                            class="relative w-full leading-5 group-hover:text-teal-500 transform transition-all delay-100 ease-in-out">
                                                            {{ $items->name }}</p>
                                                        <p class="text-xs text-gray-500 font-normal">
                                                            {{ $items->description }}</p>
                                                    </div>


                                                </a>

                                            </h3>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="relative mt-5">
                            <div class="text-xl font-bold flex items-center mb-5">
                                <h1 class="w-full">By Categories</h1>
                                <div class="bg-gray-500 h-1 w-full"></div>
                            </div>
                            <ul>
                                <li
                                    class="border-b pb-2 hover:text-teal-500 transform transition-all delay-100 ease-in-out">
                                    <a href="/berita">Berita</a>
                                </li>
                                <li
                                    class="border-b pb-2 hover:text-teal-500 transform transition-all delay-100 ease-in-out">
                                    <a href="{{ route('profile-dinas') }}">Profil Dinas</a>
                                </li>
                                <li
                                    class="border-b pb-2 hover:text-teal-500 transform transition-all delay-100 ease-in-out">
                                    <a href="/event-festival">Event & Festival</a>
                                </li>
                                @foreach (get_category() as $item)
                                    <li
                                        class="border-b pb-2 hover:text-teal-500 transform transition-all delay-100 ease-in-out">
                                        <a href="{{ route('category', $item->slug) }}">{{ $item->title }}</a>
                                    </li>
                                    @if (count($item->childrens))
                                        @forelse ($item->childrens as $child)
                                            <li
                                                class="border-b pb-2 hover:text-teal-500 transform transition-all delay-100 ease-in-out">
                                                <a
                                                    href="{{ route('category', $child->slug) }}">{{ $child->title }}</a>
                                            </li>
                                        @empty
                                        @endforelse
                                    @else
                                    @endif
                                @endforeach
                                <li
                                    class="border-b pb-2 hover:text-teal-500 transform transition-all delay-100 ease-in-out">
                                    <a href="/video-galery">Video</a>
                                </li>
                                <li
                                    class="border-b pb-2 hover:text-teal-500 transform transition-all delay-100 ease-in-out">
                                    <a href="/peta-wisata">Peta Wisata</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script type='text/javascript'
            src='https://maps.google.com/maps/api/js?language=en&key={{ env(' GOOGLE_MAP_KEY') }}&libraries=places&region=GB'>
        </script>
        <script defer>
            function initialize() {
                var mapOptions = {
                    zoom: 15,
                    minZoom: 6,
                    maxZoom: 17,
                    zoomControl: true,
                    zoomControlOptions: {
                        style: google.maps.ZoomControlStyle.DEFAULT
                    },
                    center: new google.maps.LatLng({{ $post->latitude }}, {{ $post->longitude }}),
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    scrollwheel: false,
                    panControl: false,
                    mapTypeControl: false,
                    scaleControl: false,
                    overviewMapControl: false,
                    rotateControl: false
                }
                var map = new google.maps.Map(document.getElementById('map'), mapOptions);
                var place = @json($post);

                if (place.latitude && place.longitude) {
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(place.latitude, place.longitude),
                        map: map,
                        title: place.name
                    });
                    var infowindow = new google.maps.InfoWindow();
                    google.maps.event.addListener(marker, 'click', (function(marker, place) {
                        return function() {
                            infowindow.setContent(generateContent(place))
                            infowindow.open(map, marker);
                        }
                    })(marker, place));
                }
            }
            google.maps.event.addDomListener(window, 'load', initialize);

            function generateContent(place) {
                var content =
                    `
                  <div class="flex m-4 overflow-hidden relative space-x-2"> <!--  Card -->
                              <img class="object-cover w-[200px] h-56 sm:h-[100px]" src="{{ asset('storage/destinasi') }}/` +
                    place.image_featured + `" alt="` + place.name +
                    `">
                              <div class="overflow-y-visiblerflow-hidden">
                                    <div class="font-sans text-sm font-semibold text-gray-600 capitalize md:text-md">` +
                    place.name +
                    `</div>
                                    <div class="md:mt-2">
                                    <p class="font-sans text-base antialiased font-light leading-6 text-gray-800 leading-relaxed md:text-[12px]">` +
                    place.description + `</p>
                                    </div>
                              </div>
                        </div>
                        <div class="flex p-4 align-middle border-t">
                                    <div>
                                          <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 21">
                                          <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <path d="M8 12a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                                <path d="M13.8 12.938h-.01a7 7 0 1 0-11.465.144h-.016l.141.17c.1.128.2.252.3.372L8 20l5.13-6.248c.193-.209.373-.429.54-.66l.13-.154Z"/>
                                          </g>
                                          </svg>
                                    </div>
                                    <div class="px-4">
                                    <span class="font-sans text-xs font-medium text-gray-700 uppercase md:text-sm">` +
                    place.address + `</span>
                    <a target="_blank" href="https://www.google.com/maps/dir//` + place
                    .latitude + `,` + place.longitude + `/@` + place.latitude + `,` + place.longitude + `,16z?hl=en&entry=ttu" tabindex="0"> <span> View on Google Maps </span> </a>
                                    </div>
                              </div>
                         `;
                return content;
            }
        </script>
        <script>
            var swiper = new Swiper(".mySwiper", {
                spaceBetween: 10,
                slidesPerView: 4,
                freeMode: true,
                watchSlidesProgress: true,
            });
            var swiper2 = new Swiper(".mySwiper2", {
                spaceBetween: 10,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                thumbs: {
                    swiper: swiper,
                },
            });
        </script>
    @endpush
    @push('styles')
        <style>
            .galery {
                .swiper {
                    width: 100%;
                    height: 100%;
                }

                .swiper-slide {
                    text-align: center;
                    font-size: 18px;
                    background: #fff;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .swiper-slide img {
                    display: block;
                    width: 100%;

                    object-fit: cover;
                    object-position: center;
                    height: 28em;
                }

                body {
                    background: #000;
                    color: #000;
                }

                .swiper {
                    width: 100%;
                    height: 300px;
                    margin-left: auto;
                    margin-right: auto;
                }

                .swiper-slide {
                    background-size: cover;
                    background-position: center;
                }

                .mySwiper2 {
                    height: 80%;
                    width: 100%;
                }

                .mySwiper {
                    height: 20%;
                    box-sizing: border-box;
                    padding: 10px 0;
                }

                .mySwiper .swiper-slide {
                    width: 25%;
                    height: 100%;
                    opacity: 0.4;
                }

                .mySwiper .swiper-slide-thumb-active {
                    opacity: 1;
                }

                .swiper-slide img {
                    display: block;
                    width: 100%;
                    object-fit: cover;
                }
                .thumbnail img {
                    display: block;
                    width: 100%;
                    height: 8em;
                    object-fit: cover;
                }
            }
        </style>
    @endpush
</section>
