<x-admin-layout>
    @section('title', "Admin Destinasi Management")
    @if (session('success'))
    <script>
        Swal.fire({
            type: '{{ session('success.type') }}',
            title: "Berhasil!",
            text: '{{session('success.title')}}',
            icon: "success",
            timer: 1500,
            toast: true,
            position: 'top-right'
        });
    </script>
    @endif
    <div class="mt-5">
        <div class="w-full h-auto mx-auto mb-5">
            <div class="h-[400px] rounded-md shadow-md dark:shadow-white" id="map"></div>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg dark:shadow-white">
            <div
                class="flex items-center justify-between w-full text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400 px-6 py-3">
                <a class="text-white bg-teal-500 hover:bg-teal-600 hover:shadow-lg hover:shadow-teal-300/50 dark:hover:shadow-blue-300/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700"
                    href="{{ route('destinasi.destinasi.create') }}">
                    <svg class="w-4 h-4 text-white mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 5.757v8.486M5.757 10h8.486M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Tambah Destinasi
                </a>
                <form class="w-1/2" action="{{ route('destinasi.destinasi.index') }}" method="get">
                    <div class="flex">
                        <div class="w-1/2">
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
                                placeholder="Search for" aria-label="Search for" autocomplete="off">
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
            <table class="w-full text-sm text-left text-gray-500 dark:text-white">
                <thead
                    class="text-xs text-gray-700 dark:text-white uppercase bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Destinasi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Alamat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="">Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($destinations as $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->address }}
                            </td>
                            <td
                                class="lg:flex mx-auto items-center text-center justify-center space-y-2 lg:space-y-0 lg:space-x-4 px-6 py-4">
                                <div>
                                    <div id="tooltip-edit" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Edit Destinasi
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <a href="{{ route('destinasi.destinasi.edit', $item->id) }}"
                                        data-tooltip-target="tooltip-edit" class="hover:shadow-lg hover:shadow-teal-300/50 dark:hover:shadow-blue-300/50 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-teal-500 rounded-lg hover:bg-teal-600 dark:bg-blue-600 dark:hover:bg-blue-700">
                                        <svg class="w-3 h-3 text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279" />
                                        </svg>
                                    </a>
                                </div>
                                <div>
                                    <div id="tooltip-hapus" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Hapus Destinasi
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <form method="POST" action="{{ route('destinasi.destinasi.delete', $item->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" data-tooltip-target="tooltip-hapus"
                                            class="confirm-button hover:shadow-lg hover:shadow-red-300/50 dark:hover:shadow-red-300/50 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-800 dark:bg-red-600 dark:hover:bg-red-700">
                                            <svg class="w-3 h-3 text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="justify-center items-center mx-auto">{{ $destinations->links() }}</div>
        </div>
    </div>
    @push('scripts')
        <script type='text/javascript'
            src='https://maps.google.com/maps/api/js?language=en&key={{ env(' GOOGLE_MAP_KEY') }}&libraries=places&region=GB'>
        </script>
        <script type="text/javascript">
            $('.confirm-button').click(function(event) {
                var form = $(this).closest("form");
                event.preventDefault();
                Swal.fire({
                    title: `Are you sure you want to delete this row?`,
                    text: "It will gone forevert",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                });
            });
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
                var places = @json($datadestinasi);

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
                                    <div class="font-sans text-sm font-semibold text-gray-600 capitalize md:text-md">` + place.name +
                    `</div>
                                    <div class="md:mt-2">
                                    <p class="font-sans text-base antialiased font-light leading-6 text-gray-800 leading-relaxed md:text-[12px]">` + place.description + `</p>
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
                                    <a target="_blank" jstcache="6" href="https://maps.google.com/maps?ll=` + place
                    .latitude + `,` + place.longitude + `&amp;z=15&amp;t=m&amp;hl=en&amp;gl=GB&amp;mapclient=apiv3&amp;" tabindex="0"> <span> View on Google Maps </span> </a>
                                    </div>
                              </div>
                         `;
                return content;
            }
        </script>
    @endpush
    </x-admin-layouts>
