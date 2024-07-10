@section('title', 'Profil Dinas')
<section class="relative">
    <div class="pt-16 md:pt-0">
        <div class="relative bg-gray-200">
            <div
                class="max-w-6xl px-6 xl:px-0 flex items-center py-4 mx-auto overflow-y-auto text-xs md:text-sm lg:text-md whitespace-nowrap">
                <a href="{{ route('beranda') }}" class="text-gray-600">
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

                <a href="#" class="text-teal-600 underline capitalize">
                    Profil Dinas
                </a>
            </div>
        </div>


        <section>
            <div class="max-w-6xl mx-auto w-full my-10 px-3 lg:px-0">
                <div class="flex flex-col lg:flex-row space-x-0 space-y-5 lg:space-y-0 lg:space-x-5">
                    <!-- Side Left -->
                    <div class="relative order-2 lg:order-first basis-1/5">
                        <div class="mb-3 pb-2 flex">
                            <h2 class="border-b-2 border-teal-500 text-2xl font-bold">Profil</h2>
                        </div>
                        <div class="space-y-2 text-sm font-semibold">
                            @foreach ($getlistpage as $index => $item)
                            @if ($loop->first)
                                
                            @endif
                            @if ($index)
                            <div class="border-b-2 pb-2 hover:text-teal-500">
                                <a href="{{ route('profile-page', $item->slug) }}">{{ $item->title }}</a>
                            </div>    
                            @endif

                            @endforeach
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="relative w-full order-first lg:order-2 basis-4/5 py-10 lg:py-0 px-4">
                        <article class="prose text-sm text-justify max-w-3xl">
                            {!! $getpage->body !!}
                        </article>
                    </div>
                    <div class="relative w-full md:w-auto order-last basis-1/5">
                        <div class="relative min-h-[1px] h-full">
                            <div class="sticky w-full top-0">
                                <div class="relative">
                                    <div class="text-lg font-bold flex items-center mb-5 whitespace-nowrap">
                                        <h1 class="w-full">Destinasi Populer</h1>
                                        <div class="bg-gray-500 h-1 ml-2 w-full"></div>
                                    </div>
                                    <ul class="relative">
                                        @foreach (get_wisata() as $index => $items)
                                            @if ($loop->first)
                                                <li class="group border-b-[3px] pb-4">
                                                    <div class="rounded-md">
                                                        <a
                                                            href="{{ route('detail-post', [$items->category->slug, $items->slug]) }}">
                                                            <img class="rounded-md w-full h-auto lg:h-[120px] object-cover min-h-[100px]"
                                                                src="{{ asset('storage/destinasi') }}/{{ $items->image_featured }}"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <h3
                                                        class="flex items-start text-lg lg:text-md font-bold mt-2 leading-none">
                                                        <a href="" class="flex">
                                                            <div class="w-full mr-2 lg:w-[80%]">
                                                                <p
                                                                    class="group-hover:text-teal-500 transform transition-all delay-100 ease-in-out">
                                                                    {{ $items->name }}</p>
                                                                <p
                                                                    class="text-sm lg:text-xs text-gray-500 font-normal mt-1">
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
                                                    <h3
                                                        class="flex items-start text-md font-semibold mt-2 leading-none">
                                                        <a href="{{ route('detail-post', [$items->category->slug, $items->slug]) }}"
                                                            class="relative flex w-auto h-auto">
                                                            <div
                                                                class="relative items-start justify-start text-md text-start mr-4">
                                                                <p
                                                                    class="inline-flex w-8 h-8 m-auto items-center text-center justify-center text-sm bg-gray-200 rounded-full group-hover:text-white group-hover:bg-teal-600 transform transition-all delay-100 ease-in-out">
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
                                    <div class="text-lg font-bold flex items-center mb-5 whitespace-nowrap">
                                        <h1 class="w-full">By Category</h1>
                                        <div class="bg-gray-500 h-1 ml-2 w-full"></div>
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
        </section>
    </div>
</section>
