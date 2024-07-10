<div>
    <!-- component -->
    @section('title', "User Story")
    <div class="my-6">
        <div
            class="items-center gap-16 p-8 mx-auto max-w-4xl bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md text-[#333] font-[sans-serif]">
            <div class="mb-4 border-b-2 pb-2">
                <h1 class="text-2xl font-extrabold">Let's Talk Your Story</h1>
                <p class="text-sm text-gray-400 mt-3">Berbagi cerita perjalanan anda di Buton Selatan.</p>
            </div>

            <form class="ml-auo space-y-4 mb-2">
                <div class="grid grid-cols-2 gap-8 border p-4 rounded-sm">
                    <div> <x-filepond wire:model="story_image" allowFileTypeValidation allowImageCrop="true" allowImageEdit allowImagePreview="true"
                            acceptedFileTypes="['image/png', 'image/jpg', 'image/JPG', 'image/jpeg']"
                            allowFileSizeValidation maxFileSize="4mb" />
                        @error('story_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="ml-auo space-y-4">
                        <input type='text' placeholder='Subject' wire:model="title"
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#007bff]" />
                        <textarea placeholder='Pesan & Kesan' wire:model="description" rows="6"
                            class="w-full rounded-md px-4 border text-sm pt-2.5 outline-[#007bff]"></textarea>
                    </div>
                </div>
                <button type='button' wire:click.prevent="submit()"
                    class="justify-center flex mx-auto text-white bg-[#007bff] hover:bg-blue-600 font-semibold rounded-md text-sm px-6 py-2.5 ">Bagikan</button>
            </form>
        </div>
    </div>

</div>
