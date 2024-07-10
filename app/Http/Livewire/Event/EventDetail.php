<?php

namespace App\Http\Livewire\Event;

use App\Models\Berita;
use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class EventDetail extends Component
{
    public $getevent, $newberita;
    public Event $event;
    public $previous;
    public $next;

    public function mount($slug)
    {
        $this->newberita = Berita::withCount('totalComments')->with('user')->latest()->limit(5)->get();
        $this->getevent = Event::where('slug', $slug)->withCount('totalComments')->with('user')->first();
        $this->getevent->update([
            'viewer' => $this->getevent->viewer + 1
           ]);
        $this->previous = Event::with('user')
        ->where('id', '<', $this->getevent->id)
        ->orderBy('id', 'desc')
        ->first();
        $this->next = Event::with('user')
        ->where('id', '>', $this->getevent->id)
        ->orderBy('id', 'asc')
        ->first();
    }
    public function render()
    {
        return view('livewire.event.event-detail')->layout('layouts.guest');
    }
}
