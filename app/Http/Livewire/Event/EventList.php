<?php

namespace App\Http\Livewire\Event;

use App\Models\Berita;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class EventList extends Component
{
    use WithPagination;
    public $search = '';
    public $amount = 5;
    public $orderBy = 'created_at';

    public function loadMore()
    {
        $this->amount += 5;
    }
    public function render()
    {
        $result = Event::selectRaw('year(date_time) year, monthname(date_time) month, count(*) data')
                ->groupBy('year', 'month')
                ->orderBy('year', 'desc')
                ->get();
        sleep(1);
        $newberita = Berita::withCount('totalComments')->with('user')->latest()->limit(5)->get();

        $this->orderBy = $this->orderBy;
        $eventlist = Event::where('title', 'like', '%'. $this->search .'%')
        ->orWhere('description', 'like', '%'. $this->search .'%')
        ->withCount('totalComments')->withCount('votes')->with('user')->orderBy($this->orderBy,'desc')
        ->take($this->amount)->get();
        return view('livewire.event.event-list', [
            'eventlist' => $eventlist,
            'newberita' => $newberita,
        ])->layout('layouts.guest');
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
