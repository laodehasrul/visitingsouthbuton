<?php

namespace App\Http\Livewire\Admin\Destinasi\Kategori;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public $data, $title, $description, $slug, $data_post, $parent_id;
    public $newimage, $oldimage;
    public $isModalOpen = false;
    public $isEditMode = false;
    

    protected $listeners  = ['delete'];
    
    public function create()
    {
        if(!Gate::allows('tambah kategori')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->reset();
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->resetValidation();
        $this->reset();
        $this->isModalOpen = false;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }
    public function submit()
    {
        if(!Gate::allows('tambah kategori')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:categories,slug',
            'description' => 'required|min:6',
            'parent_id' => 'nullable|numeric',
            'newimage' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ],[
            'title.required' => 'Nama Kategori Tidak Boleh Kosong!',
            'slug.required' => 'Slug Tidak Boleh Kosong!',
            'slug.unique' => 'Slug harus unik!',
            'description.required' => 'Deskripsi Tidak Boleh Kosong!',
            'description.min' => 'Deskripsi Minimal 6 Karakter!',
            'newimage.max' => 'Max file 2Mb',
            'newimage.mimes' => 'Format File (jpg, jpeg, png)!',
        ]);
        if($this->newimage){
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->getClientOriginalExtension();
            $this->newimage->storeAs('category', $imageName, 'public');
        }
        Category::create([
            'title' => $this->title,
            'description' => $this->description,
            'slug' => $this->slug,
            'parent_id' => $this->parent_id,
            'image_featured' => $imageName,
        ]);

        $this->closeModalPopover();
        $this->dispatchBrowserEvent('swalpopup', [
            "type" => 'success',
            "title" => 'Kategori Berhasil di Tambahkan!',
            'timer'=>1500,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right'
        ]);
        $this->reset();
    }
    public function showEditModal($id)
    {  
        if(!Gate::allows('edit kategori')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->resetValidation();
        $this->data_post = Category::findOrFail($id);
        $this->title = $this->data_post->title;
        $this->description = $this->data_post->description;
        $this->slug = $this->data_post->slug;
        $this->parent_id = $this->data_post->parent_id;
        $this->oldimage = $this->data_post->image_featured;
        $this->isEditMode = true;
        $this->isModalOpen = true;
    }
    public function updateData()
    {
        if(!Gate::allows('edit kategori')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:categories,slug,'. $this->data_post->id,
            'description' => 'required|min:6',
            'parent_id' => 'nullable|numeric',
        ],[
            'title.required' => 'Nama Kategori Tidak Boleh Kosong!',
            'slug.required' => 'Slug Tidak Boleh Kosong!',
            'slug.unique' => 'Slug harus unik!',
            'description.required' => 'Deskripsi Tidak Boleh Kosong!',
            'description.min' => 'Deskripsi Minimal 6 Karakter!',
        ]);
        $imageName = $this->data_post->image_featured;
        if ($this->newimage) {
            $this->validate([
                'newimage' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ],[
                'newimage.required' => 'Gambar Tidak Boleh Kosong!',
                'newimage.max' => 'Max file 2Mb',
                'newimage.mimes' => 'Format File (jpg, jpeg, png)!',
            ]);
            Storage::disk('public')->delete('/category/' . $imageName);
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->getClientOriginalExtension();
            $this->newimage->storeAs('category', $imageName, 'public');
        }
        $this->data_post->update([
            'title' => $this->title,
            'description' => $this->description,
            'slug' => $this->slug,
            'parent_id' => $this->parent_id,
            'image_featured' => $imageName,
        ]);
        $this->dispatchBrowserEvent('swalpopup', [
            "type" => 'success',
            "title" => 'Kategori Berhasil di Update!',
            'timer'=>1500,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right'
        ]);
        $this->reset();
    }
    public function deleteConfirm($id)
    {
        if(!Gate::allows('hapus kategori')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->dispatchBrowserEvent('swal:confirm',[
            "type" => 'warning',
            "title" => 'Yakin di Hapus?',
            "text" => '',
            "id" => $id,
        ]);
    }

    public function delete($id)
    {
        if(!Gate::allows('hapus kategori')){
            return $this->dispatchBrowserEvent('access');
        }
        $data_post = Category::findOrFail($id);
        Storage::disk('public')->delete('/category/' . $data_post->image_featured);
        $data_post->delete();
        $this->reset();
    }
    public function render()
    {
        if(!Gate::allows('view kategori')){
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        $this->data = Category::with('childrens')->whereNull('parent_id')->latest()->get();
        $categories = Category::where('parent_id', null)->orderby('title', 'asc')->get();
        return view('livewire.admin.destinasi.kategori.index',[
            'categories' => $categories
        ]);
    }
}
