<div wire:ignore x-data x-init="() => {
    const post = FilePond.create($refs.{{ $attributes->get('ref') ?? 'input' }});
    this.addEventListener('postReset', e => {
        post.removeFiles();
    });
    post.setOptions({
        allowMultiple: {{ $attributes->has('multiple') ? 'true' : 'false' }},
        server: {
            process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                @this.upload('{{ $attributes->whereStartsWith('wire:model')->first() }}', file, load, error, progress)
            },
            revert: (filename, load) => {
                @this.removeUpload('{{ $attributes->whereStartsWith('wire:model')->first() }}', filename, load)
            },
        },
        allowImageEdit: {{ $attributes->has('allowImageEdit') ? 'true' : 'false' }},
        allowImageCrop: {{ $attributes->has('allowImageCrop') ? 'true' : 'false' }},
        allowImagePreview: {{ $attributes->has('allowImagePreview') ? 'true' : 'false' }},
        imagePreviewMaxHeight: {{ $attributes->has('imagePreviewMaxHeight') ? $attributes->get('imagePreviewMaxHeight') : '256' }},
        allowFileTypeValidation: {{ $attributes->has('allowFileTypeValidation') ? 'true' : 'false' }},
        acceptedFileTypes: {!! $attributes->get('acceptedFileTypes') ?? 'null' !!},
        allowFileSizeValidation: {{ $attributes->has('allowFileSizeValidation') ? 'true' : 'false' }},
        maxFileSize: {!! $attributes->has('maxFileSize') ? "'" . $attributes->get(' maxFileSize') . "'" : 'null' !!}
    });
}">
    <input type=" file" x-ref="{{ $attributes->get('ref') ?? 'input' }}" />
</div>
@push('styles')
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        FilePond.registerPlugin(FilePondPluginFileValidateType);
        FilePond.registerPlugin(FilePondPluginFileValidateSize);
        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.registerPlugin(FilePondPluginImageCrop);
        FilePond.registerPlugin(FilePondPluginImageEdit);
    </script>
@endpush
