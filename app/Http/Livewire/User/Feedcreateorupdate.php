<?php

namespace App\Http\Livewire\User;

use App\Models\Story;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Feedcreateorupdate extends Component
{
    use WithFileUploads;
    public $title, $description, $story_image, $route;

    public function mount(){
        $this->route = url()->previous();
    }

    public function submit()
    {
        $test = $this->validate([
            'title' => 'required|min:6',
            'description' => 'nullable',
            'story_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ],
        [
            'title.required' => 'Judul tidak boleh kosong!',
            'title.min' => 'Judul minimal 6 karakter!',
            'story_image.required' => 'Gambar harus diisi!',
            'story_image.mimes' => 'Format file (jpg, jpeg, png)',
            'story_image.max' => 'Max file 2Mb',
        ]);
        if($this->story_image){
            $username = Str::slug(auth()->user()->name);
            $title = Str::slug($this->title);
            $imageName = $username. '_' .$title. '_' .Carbon::now()->timestamp. '.' .$this->story_image->getClientOriginalExtension();
            $this->story_image->storeAs('story', $imageName, 'public');
        }
        Story::create([
            'title' => $this->title,
            'description' => $this->description,
            'story_image' => $imageName,
            'user_id' => auth()->user()->id,
        ]);
  
        $this->dispatchBrowserEvent('swalpopup', [
            "type" => 'success',
            "title" => 'Cerita Berhasil di Bagikan!',
            'timer'=>1500,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right'
        ]);
        sleep(3);
        return redirect($this->route); 

    }
    public function render()
    {
        return view('livewire.user.feedcreateorupdate')->layout('layouts.guest');
    }
}
