<?php

namespace App\Http\Livewire\User;

use App\Models\Story;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class Feedupdate extends Component
{
    use WithFileUploads;
    public $data, $title, $description, $story_image, $route, $newimage_story;

    public function mount(Story $story){
        $this->data = Story::findOrFail($story->id);
        $this->title = $this->data->title;
        $this->description = $this->data->description;
        $this->story_image = $this->data->story_image;
        $this->route = url()->previous();

    }
    public function submit()
    {
        
        $this->validate([
            'title' => 'required|min:6',
            'description' => 'nullable',

        ],
        [
            'title.required' => 'Judul tidak boleh kosong!',
            'title.min' => 'Judul minimal 6 karakter!',
        ]);
        $imageName = $this->data->story_image;
        if ($this->newimage_story) {
            $this->validate([
                'newimage_story' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ],[
                'newimage_story.required' => 'Gambar Tidak Boleh Kosong!',
                'newimage_story.max' => 'Max file 2Mb',
                'newimage_story.mimes' => 'Format File (jpg, jpeg, png)!',
            ]);
            Storage::disk('public')->delete('/story/' . $imageName);
            $username = Str::slug(auth()->user()->name);
            $title = Str::slug($this->title);
            $imageName = $username. '_' .$title. '_' .Carbon::now()->timestamp. '.' .$this->newimage_story->getClientOriginalExtension();
            $this->newimage_story->storeAs('story', $imageName, 'public');
        }
        $this->data->update([
            'title' => $this->title,
            'description' => $this->description,
            'story_image' =>$imageName,
        ]);
  
        $this->dispatchBrowserEvent('swalpopup', [
            "type" => 'success',
            "title" => 'Cerita Berhasil diupdate!',
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
        return view('livewire.user.feedupdate')->layout('layouts.guest');
    }
}
