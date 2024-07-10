<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Illuminate\Support\Str;

class Edit extends Component
{

    public $data_post;
    public $data, $title, $body, $description, $slug;


    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }
    public function mount($id)
    {
        if (!Gate::allows('edit page')) {
            return $this->dispatchBrowserEvent('access');
        }
        $this->data_post = Page::findOrFail($id);
        $this->title = $this->data_post->title;
        $this->slug = $this->data_post->slug;
        $this->description = $this->data_post->description;
        $this->body = $this->data_post->body;
    }
    public function submit()
    {
        if (!Gate::allows('edit page')) {
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:events,slug,' . $this->data_post->id,
            'description' => 'required|min:6',
            'body' => 'required|min:10',
        ], [
            'title.required' => 'Judul Event Tidak Boleh Kosong!',
            'slug.required' => 'Slug Tidak Boleh Kosong!',
            'slug.unique' => 'Slug harus unik!',
            'description.required' => 'Deskripsi Tidak Boleh Kosong!',
            'description.min' => 'Deskripsi Minimal 6 Karakter!',
            'date.required' => 'Tanggal Event Tidak Boleh Kosong!',
            'body.required' => 'Konten Tidak Boleh Kosong!',
            'body.min' => 'Konten Minimal 10 Karakter!'
        ]);
        $this->data_post->update([
            'title' => $this->title,
            'description' => $this->description,
            'body' => $this->body,
            'slug' => $this->slug,
        ]);
        $this->reset();
        $this->skipRender();
        return redirect()->to('/admin/pages')->with(
            'success',
            [
                "type" => 'success',
                "title" => 'Page Berhasil di Update!',
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
        if (!Gate::allows('edit page')) {
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        return view('livewire.admin.pages.edit')->layout('layouts.admin');
    }
}
