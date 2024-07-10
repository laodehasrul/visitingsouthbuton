<div class="z-20">
    <div class="grid lg:grid-cols-3 2xl:grid-cols-3 grid-cols-1 gap-1">
        @forelse ($videos as $video)
            <div wire:key="{{ $video->id }}">
                <button wire:click="showVideo({{ $video->id }})"
                    class="relative group w-full mx-auto shadow-xl bg-cover bg-center transform duration-500 hover:-translate-y-2 cursor-pointer group">
                    <x-embed class="w-full" url="{{ $video->url_video }}" aspect-ratio="16:9" />
                    <div
                        class="absolute rounded-md top-0 p-8 pt-24  w-full h-full bg-black bg-opacity-20 flex flex-wrap flex-col hover:bg-opacity-75 transform duration-300">
                        <div
                            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white opacity-0 group-hover:opacity-100 transition ease-in-out delay-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-12 h-12">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
                            </svg>
                        </div>
                        <div class="absolute bottom-0 mb-4">

                            <h1 class="text-white text-md uppercase font-bold mb-2 transform duration-300">
                                {{ $video->title }}
                            </h1>
                            <div class="flex space-x-2 items-center">
                                <div class="text-white text-xs py-0.5 px-1 flex bg-teal-500 transform duration-300">
                                    <p>Video</p>
                                </div>
                                <p class="text-white text-xs">
                                    {{ \Carbon\Carbon::parse($video->created_at)->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>

                    </div>
                </button>
            </div>
        @empty
            <div class="mt-2">Not Found Result</div>
        @endforelse
    </div>
    @if ($isModalOpen)
        @include('components.video-modal')
    @endif
    @push('styles')
        <style>
            .laravel-embed__responsive-wrapper {
                position: relative;
                height: 100%;
                overflow: hidden;
                max-width: 100%;
                min-height: 220px;
            }

            .laravel-embed__fallback {
                background: rgba(0, 0, 0, 0.15);
                color: rgba(0, 0, 0, 0.7);
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .laravel-embed__fallback,
            .laravel-embed__responsive-wrapper iframe,
            .laravel-embed__responsive-wrapper object,
            .laravel-embed__responsive-wrapper embed {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                border-radius: 10px
            }
        </style>
    @endpush
</div>
