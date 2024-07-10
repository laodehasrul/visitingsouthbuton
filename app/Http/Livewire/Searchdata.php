<?php

namespace App\Http\Livewire;

use App\Models\Berita;
use App\Models\Destination;
use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class Searchdata extends Component
{
    use WithPagination;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        sleep(1);
        $berita_search = [];
        $event_search = [];
        $destinasi_search = [];
        $berita_count = 0;
        $event_count = 0;
        $destinasi_count = 0;
        if (strlen($this->search) > 2) {
            $berita_search = Berita::where('title', 'like', '%' . $this->search . '%')
                ->withCount('totalComments')->with('user')
                ->latest()->limit(5)->get();
            $berita_count = $berita_search->count();
            $event_search = Event::where('title', 'like', '%' . $this->search . '%')
                ->with('user')
                ->latest()->limit(5)->get();
            $event_count = $event_search->count();
            $destinasi_search = Destination::where('name', 'like', '%' . $this->search . '%')
                ->with('user')
                ->latest()->limit(5)->get();
            $destinasi_count = $destinasi_search->count();
        }

        return view('livewire.searchdata', compact('berita_search', 'berita_count','event_search','event_count','destinasi_search','destinasi_count'))->layout('layouts.guest');
    }
}
