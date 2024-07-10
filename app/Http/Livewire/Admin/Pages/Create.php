<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;
    public $title, $body, $description, $slug;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }
    public function submit()
    {
        if(!Gate::allows('tambah page')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:pages,slug',
            'description' => 'required|min:6',
            'body' => 'required|min:10',
        ],[
            'title.required' => 'Judul Berita Tidak Boleh Kosong!',
            'slug.required' => 'Slug Tidak Boleh Kosong!',
            'slug.unique' => 'Slug harus unik!',
            'description.required' => 'Deskripsi Tidak Boleh Kosong!',
            'description.min' => 'Deskripsi Minimal 6 Karakter!',
            'body.required' => 'Konten Tidak Boleh Kosong!',
            'body.min' => 'Konten Minimal 10 Karakter!'
        ]);
        Page::create([
            'title' => $this->title,
            'description' => $this->description,
            'body' => $this->body,
            'slug' => $this->slug,
            'order_position' => 0
        ]);
        $this->reset();
        return redirect()->to('/admin/pages')->with(
            'success',
            [
                "type" => 'success',
                "title" => 'Page Berhasil di Tambahkan!',
                "text" => '',
            ]
        );
        
    }
    public function back()
    {
        $this->reset();
        return redirect()->to('/admin/pages');
    }

    public function render()
    {
        if(!Gate::allows('tambah page')){
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        return view('livewire.admin.pages.create')->layout('layouts.admin');
    }
}
