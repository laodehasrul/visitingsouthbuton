<?php

namespace App\Http\Livewire\Admin\Berita;

use App\Models\Berita;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Edit extends Component
{
    public $data_post;
    use WithFileUploads;
    public $data, $title, $content, $newimage, $oldimage, $description, $slug;
    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }
    public function mount($id)
    {
        if(!Gate::allows('hapus berita')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->data_post = Berita::findOrFail($id);
        $this->title = $this->data_post->title;
        $this->slug  = $this->data_post->slug;
        $this->description  = $this->data_post->description;
        $this->oldimage  = $this->data_post->image_featured;
        $this->content  = $this->data_post->content;
    }
    public function submit()
    {
        if(!Gate::allows('hapus berita')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:beritas,slug,' . $this->data_post->id,
            'description' => 'required|min:6',
            'content' => 'required|min:10',
        ], [
            'title.required' => 'Judul Berita Tidak Boleh Kosong!',
            'slug.required' => 'Slug Tidak Boleh Kosong!',
            'slug.unique' => 'Slug harus unik!',
            'description.required' => 'Deskripsi Tidak Boleh Kosong!',
            'description.min' => 'Deskripsi Minimal 6 Karakter!',
            'content.required' => 'Konten Tidak Boleh Kosong!',
            'content.min' => 'Konten Minimal 10 Karakter!'
        ]);
        $imageName = $this->data_post->image_featured;
        if ($this->newimage) {
            $this->validate([
                'newimage' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ], [
                'newimage.mimes' => 'Format File (jpg, jpeg, png)!',
                'newimage.max' => 'Max file 2Mb',
            ]);
            Storage::disk('public')->delete('/berita/' . $imageName);
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->getClientOriginalExtension();
            $this->newimage->storeAs('berita', $imageName, 'public');
        }
        $this->data_post->update([
            'user_id' => Auth::user()->id,
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'slug' => $this->slug,
            'image_featured' => $imageName,
        ]);
        $this->reset();

        $this->skipRender();
        return redirect()->to('/admin/berita')->with(
            'success',
            [
                "type" => 'success',
                "title" => 'Berita Berhasil di Update!',
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
        if(!Gate::allows('edit berita')){
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        return view('livewire.admin.berita.edit')->layout('layouts.admin');
    }
}
