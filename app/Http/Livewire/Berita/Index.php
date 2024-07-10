<?php

namespace App\Http\Livewire\Berita;

use App\Models\Berita;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search = '';
    public $amount = 5;
    public $orderBy = 'created_at';

    public function loadMore() {
        $this->amount+=5;
    }

    public function render()
    {
        
        sleep(1);
        $this->orderBy = $this->orderBy;
        $newBeritas = Berita::where('title', 'like', '%'. $this->search .'%')
        ->orWhere('description', 'like', '%'. $this->search .'%')
        ->withCount('totalComments')->withCount('votes')->with('user')->orderBy($this->orderBy,'desc')
        ->take($this->amount)->get();

        //$beritalist = Berita::where('title', 'like', '%'. $this->search .'%')
        //->orWhere('description', 'like', '%'. $this->search .'%')
        //->withCount('totalComments')->with('user')
        //->latest()->paginate(5);
        return view('livewire.berita.index', [
            'beritalist' => $newBeritas
        ])->layout('layouts.guest');
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
