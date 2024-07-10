<?php $dash.='-- '; ?>
@foreach($subcategories as $subcategory)
    <option value="{{$subcategory->id}}" @if($category->parent_id == $subcategory->id ) selected @endif>{{$dash}}{{$subcategory->title}}</option>
    @if(count($subcategory->childrens))
        @include('livewire.admin.destinasi.kategori.child',['subcategories' => $subcategory->childrens])
    @endif
@endforeach