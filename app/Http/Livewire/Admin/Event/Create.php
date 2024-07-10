<?php

namespace App\Http\Livewire\Admin\Event;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;


class Create extends Component
{
    use WithFileUploads;
    public $title, $content, $date, $newimage, $description, $slug;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }
    public function submit()
    {
        if(!Gate::allows('tambah event')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:events,slug',
            'description' => 'required|min:6',
            'date' => 'required|date',
            'newimage' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'content' => 'required|min:10',
        ],[
            'title.required' => 'Judul Event Tidak Boleh Kosong!',
            'slug.required' => 'Slug Tidak Boleh Kosong!',
            'slug.unique' => 'Slug harus unik!',
            'description.required' => 'Deskripsi Tidak Boleh Kosong!',
            'description.min' => 'Deskripsi Minimal 6 Karakter!',
            'date.required' => 'Tanggal Event Tidak Boleh Kosong!',
            'newimage.required' => 'Gambar Tidak Boleh Kosong!',
            'newimage.max' => 'Max file 2Mb',
            'newimage.mimes' => 'Format File (jpg, jpeg, png)!',
            'content.required' => 'Konten Tidak Boleh Kosong!',
            'content.min' => 'Konten Minimal 10 Karakter!'
        ]);
        if($this->newimage){
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->getClientOriginalExtension();
            $this->newimage->storeAs('event-festival', $imageName, 'public');
        }
        Event::create([
            'user_id' => Auth::user()->id,
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'slug' => $this->slug,
            'image_featured' => $imageName,
            'date_time' => $this->date
        ]);
        $this->reset();

        return redirect()->to('/admin/event-festival')->with(
            'success',
            [
                "type" => 'success',
                "title" => 'Event Berhasil di Tambahkan!',
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
        return view('livewire.admin.event.create')->layout('layouts.admin');
    }
}
