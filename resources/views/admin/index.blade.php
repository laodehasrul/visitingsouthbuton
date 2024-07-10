<x-admin-layout>

    <div class="w-full my-2">
        <div id="gallery" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Item  -->
                @foreach (get_kanban() as $kanban)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('storage/kanban') }}/{{ $kanban->image }}"
                            class="absolute block w-full max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="">
                    </div>
                @endforeach
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>
    <div class="md:flex mt-2 w-full gap-3">
        <div class="w-full md:w-[60%] rounded-md relative overflow-x-auto dark:shadow-md dark:shadow-white">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Destinasi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            View
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Like
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Comment
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (get_wisata() as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->name }}
                            </th>
                            <td class="px-6 py-4">

                                @if ($item->viewer > 0)
                                    {{ $item->viewer }}
                                @else
                                    0
                                @endif

                            </td>
                            <td class="px-6 py-4">

                                @if ($item->destinationvote_count > 0)
                                    {{ $item->destinationvote_count }}
                                @else
                                    0
                                @endif

                            </td>
                            <td class="px-6 py-4">
                                {{ $item->totalComments->count() }}
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
    <!-- end content -->

    <script>
        // ApexCharts options and config
        window.addEventListener("load", function() {
            let options = {
                chart: {
                    height: "50%",
                    maxWidth: "100%",
                    type: "area",
                    fontFamily: "Inter, sans-serif",
                    dropShadow: {
                        enabled: false,
                    },
                    toolbar: {
                        show: false,
                    },
                },
                tooltip: {
                    enabled: true,
                    x: {
                        show: false,
                    },
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        opacityFrom: 0.55,
                        opacityTo: 0,
                        shade: "#1C64F2",
                        gradientToColors: ["#1C64F2"],
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: 6,
                },
                grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: 0
                    },
                },
                series: [{
                    name: "New users",
                    data: [6500, 6418, 6456, 6526, 6356, 6456],
                    color: "#1A56DB",
                }, ],
                xaxis: {
                    categories: ['01 February', '02 February', '03 February', '04 February', '05 February',
                        '06 February', '07 February'
                    ],
                    labels: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    show: false,
                },
            }

            if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("area-chart"), options);
                chart.render();
            }
        });
    </script>
</x-admin-layout>
