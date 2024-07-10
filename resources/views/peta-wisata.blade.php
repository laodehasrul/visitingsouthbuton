<x-guest-layout>
    @section('title', 'Peta Wisata')
    <section>
        <div class="relative">
            <div class="py-24 px-4">
                <div class="w-full max-w-5xl mx-auto">
                    <div class="">
                        <form action="{{ route('peta-wisata') }}" method="get">
                            <div class="flex">
                                <div class="w-1/3">
                                    <select id="category" name="category"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" selected>Semua Kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category', request()->input('category')) == $category->id ? ' selected' : '' }}>
                                                {{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
    
                                <div class="relative w-full">
                                    <input type="text" id="search-dropdown" name="search"
                                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                        value="{{ old('search', request()->input('search')) }}" type="text"
                                        placeholder="Pencarian..." aria-label="Pencarian..." autocomplete="off">
                                    <button type="submit"
                                        class="absolute top-0 right-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                        <span class="sr-only">Search</span>
                                    </button>
                                </div>
                            </div>
                        </form>
    
                    </div>
                </div>
                <div class="h-screen max-w-5xl mx-auto shadow-xl">
                    <div class="flex space-x-5">
                    </div>
                    <div class="w-full h-screen" id="map">
                    </div>
                </div>
            </div>


        </div>
    </section>
    @push('scripts')
        <script type='text/javascript'
            src='https://maps.google.com/maps/api/js?language=en&key={{ env(' GOOGLE_MAP_KEY') }}&libraries=places&region=GB'>
        </script>
        <script defer>
            function initialize() {
                var mapOptions = {
                    zoom: 12,
                    minZoom: 6,
                    maxZoom: 17,
                    zoomControl: true,
                    zoomControlOptions: {
                        style: google.maps.ZoomControlStyle.DEFAULT
                    },
                    center: new google.maps.LatLng({{ $latitude }}, {{ $longitude }}),
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    scrollwheel: false,
                    panControl: false,
                    mapTypeControl: false,
                    scaleControl: false,
                    overviewMapControl: false,
                    rotateControl: false
                }
                var map = new google.maps.Map(document.getElementById('map'), mapOptions);
                var places = @json($destinations);

                for (place in places) {
                    place = places[place];
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
    @endpush
    </x-guest-layouts>
