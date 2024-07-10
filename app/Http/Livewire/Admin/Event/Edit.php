<?php

namespace App\Http\Livewire\Admin\Event;

use App\Models\Event;
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
    public $data, $title, $content, $date, $newimage, $oldimage, $description, $slug;
    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }
    public function mount($id)
    {
        if(!Gate::allows('edit event')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->data_post = Event::findOrFail($id);
        $this->title    = $this->data_post->title;
        $this->slug  = $this->data_post->slug;
        $this->description  = $this->data_post->description;
        $this->oldimage  = $this->data_post->image_featured;
        $this->content  = $this->data_post->content;
        $this->date  = Carbon::parse($this->data_post->date_time)->format('m/d/Y');
    }
    public function submit()
    {
        if(!Gate::allows('edit event')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:events,slug,' . $this->data_post->id,
            'description' => 'required|min:6',
            'date' => 'required|date',
            'content' => 'required|min:10',
        ],[
            'title.required' => 'Judul Event Tidak Boleh Kosong!',
            'slug.required' => 'Slug Tidak Boleh Kosong!',
            'slug.unique' => 'Slug harus unik!',
            'description.required' => 'Deskripsi Tidak Boleh Kosong!',
            'description.min' => 'Deskripsi Minimal 6 Karakter!',
            'date.required' => 'Tanggal Event Tidak Boleh Kosong!',
            'content.required' => 'Konten Tidak Boleh Kosong!',
            'content.min' => 'Konten Minimal 10 Karakter!'
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
            Storage::disk('public')->delete('/event-festival/' . $imageName);
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->getClientOriginalExtension();
            $this->newimage->storeAs('event-festival', $imageName, 'public');
        }
        $this->data_post->update([
            'user_id' => Auth::user()->id,
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'slug' => $this->slug,
            'image_featured' => $imageName,
            'date_time' => $this->date
        ]);
        $this->reset();
        $this->skipRender();
        return redirect()->to('/admin/event-festival')->with(
            'success',
            [
                "type" => 'success',
                "title" => 'Event Berhasil di Update!',
                "text" => '',
            ]
        );
    }
    public function back()
    {
        $this->reset();
        return redirect()->to('/admin/event-festival');
    }
    public function render()
    {
        return view('livewire.admin.event.edit')->layout('layouts.admin');
    }
}
