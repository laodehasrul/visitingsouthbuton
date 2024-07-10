<?php

namespace App\Http\Livewire\Admin\Berita;

use App\Models\Berita;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class Create extends Component
{
    use WithFileUploads;
    public $title, $content, $newimage, $description, $slug;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }
    public function submit()
    {
        if(!Gate::allows('hapus berita')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:beritas,slug',
            'description' => 'required|min:6',
            'newimage' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'content' => 'required|min:10',
        ],[
            'title.required' => 'Judul Berita Tidak Boleh Kosong!',
            'slug.required' => 'Slug Tidak Boleh Kosong!',
            'slug.unique' => 'Slug harus unik!',
            'description.required' => 'Deskripsi Tidak Boleh Kosong!',
            'description.min' => 'Deskripsi Minimal 6 Karakter!',
            'newimage.required' => 'Gambar Tidak Boleh Kosong!',
            'newimage.max' => 'Max file 2Mb',
            'newimage.mimes' => 'Format File (jpg, jpeg, png)!',
            'content.required' => 'Konten Tidak Boleh Kosong!',
            'content.min' => 'Konten Minimal 10 Karakter!'
        ]);
        if($this->newimage){
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->getClientOriginalExtension();
            $this->newimage->storeAs('berita', $imageName, 'public');
        }
        Berita::create([
            'user_id' => Auth::user()->id,
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'slug' => $this->slug,
            'image_featured' => $imageName,
        ]);
        $this->reset();
        return redirect()->to('/admin/berita')->with(
            'success',
            [
                "type" => 'success',
                "title" => 'Berita Berhasil di Tambahkan!',
                "text" => '',
            ]
        );
        
    }
    public function back()
    {
        $this->reset();
        return redirect()->to('/admin/berita');
    }

    public function render()
    {
        if(!Gate::allows('tambah berita')){
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        return view('livewire.admin.berita.create')->layout('layouts.admin');
    }
}
