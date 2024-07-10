<div wire:ignore>
    <textarea class="ckeditor" name="" id="{{ $attributes['id'] }}" wire:model="{{ $attributes['wire:model'] }}" cols="30" rows="10"></textarea>
        @push('scripts')
        <script src="{{asset('ckeditor4/ckeditor.js')}}"></script>
        <script>
            const editor = CKEDITOR.replace('{{ $attributes['id'] }}', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
            editor.on('change', function(event){
                console.log(event.editor.getData())
                @this.set('{{ $attributes['wire:model'] }}', event.editor.getData());
            })
        </script>
        @endpush
</div>