<?php

namespace App\Http\Livewire\Admin\Video;

use App\Models\Video;
use Livewire\Component;
use Illuminate\Support\Str;
use BenSampo\Embed\Services\Vimeo;
use BenSampo\Embed\Services\YouTube;
use BenSampo\Embed\Rules\EmbeddableUrl;
use Illuminate\Support\Facades\Gate;

class Create extends Component
{
    public $title, $content, $description, $slug, $url_video;
    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }
    public function submit()
    {
        if(!Gate::allows('tambah video')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:events,slug',
            'description' => 'required|min:6',
            'url_video' => [
                'required',
                (new EmbeddableUrl)->allowedServices([
                    YouTube::class,
                    Vimeo::class
                ])
            ],
        ],[
            'title.required' => 'Judul Tidak Boleh Kosong!',
            'slug.required' => 'Slug Tidak Boleh Kosong!',
            'slug.unique' => 'Slug harus unik!',
            'description.required' => 'Deskripsi Tidak Boleh Kosong!',
            'description.min' => 'Deskripsi Minimal 6 Karakter!',
            'url_video.required' => 'Link URL Tidak Boleh Kosong!',
        ]);
        Video::create([
            'title' => $this->title,
            'description' => $this->description,
            'slug' => $this->slug,
            'url_video' => $this->url_video
        ]);
        $this->reset();

        return redirect()->to('/admin/video')->with(
            'success',
            [
                "type" => 'success',
                "title" => 'Video Berhasil di Tambahkan!',
                "text" => '',
            ]
        );
    }

    public function back()
    {
        $this->reset();
        return redirect()->to('/admin/video');
    }
    public function render()
    {
        if(!Gate::allows('tambah video')){
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        return view('livewire.admin.video.create')->layout('layouts.admin');
    }
}
