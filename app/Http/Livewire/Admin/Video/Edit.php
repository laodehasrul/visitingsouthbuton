<?php

namespace App\Http\Livewire\Admin\Video;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use BenSampo\Embed\Services\Vimeo;
use BenSampo\Embed\Services\YouTube;
use BenSampo\Embed\Rules\EmbeddableUrl;
use Illuminate\Support\Facades\Gate;

class Edit extends Component
{
    public $data_post;
    use WithFileUploads;

    public $data, $title, $url_video, $description, $slug;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }
    public function mount($id)
    {
        if(!Gate::allows('edit video')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->data_post = Video::findOrFail($id);
        $this->title    = $this->data_post->title;
        $this->slug  = $this->data_post->slug;
        $this->description  = $this->data_post->description;
        $this->url_video  = $this->data_post->url_video;
    }
    public function submit()
    {
        if(!Gate::allows('edit video')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:events,slug,' . $this->data_post->id,
            'description' => 'required|min:6',
            'url_video' => [
                'required',
                (new EmbeddableUrl)->allowedServices([
                    YouTube::class,
                    Vimeo::class
                ])
            ],
        ],[
            'title.required' => 'Judul Event Tidak Boleh Kosong!',
            'slug.required' => 'Slug Tidak Boleh Kosong!',
            'slug.unique' => 'Slug harus unik!',
            'description.required' => 'Deskripsi Tidak Boleh Kosong!',
            'description.min' => 'Deskripsi Minimal 6 Karakter!',
            'url_video.required' => 'Link URL Tidak Boleh Kosong!',
        ]);
        $this->data_post->update([
            'title' => $this->title,
            'description' => $this->description,
            'url_video' => $this->url_video,
            'slug' => $this->slug,
        ]);
        $this->reset();
        $this->skipRender();
        return redirect()->to('/admin/video')->with(
            'success',
            [
                "type" => 'success',
                "title" => 'Video Berhasil di Update!',
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
        if(!Gate::allows('edit video')){
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        return view('livewire.admin.video.edit')->layout('layouts.admin');
    }
}
