<?php

namespace App\Http\Livewire\Berita;

use App\Models\Berita;
use App\Models\BeritaVote;
use App\Models\Destination;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detail extends Component
{
  
    public $newberita, $destinasi;
    public Berita $getberita;
    public $previous;
    public $next;
    public int $count;



    public function mount($slug)
    {
        $this->destinasi = Destination::withCount('totalComments')->with('user')->latest()->limit(6)->get();
        $this->getberita = Berita::where('slug', $slug)->withCount('totalComments')->with('user')->first();
        $this->getberita->update([
            'viewer' => $this->getberita->viewer + 1
           ]);
        $this->previous = Berita::with('user')
            ->where('id', '<', $this->getberita->id)
            ->orderBy('id', 'desc')
            ->first();
        $this->next = Berita::with('user')
            ->where('id', '>', $this->getberita->id)
            ->orderBy('id', 'asc')
            ->first();

    }

    public function render()
    {
        return view(
            'livewire.berita.detail',[
                'getberita' => Berita::where('slug', $this->getberita->slug)->get(),
            ]
        )->layout('layouts.guest');
    }

    public function like($id)
    {
        $data = [
            'berita_id' => $id,
            'user_id' => Auth::user()->id,
        ];
        $like = BeritaVote::where($data);
        if ($like->count() > 0) {
            $like->delete();
        } else {
            BeritaVote::create($data);
        }
        return NULL;
    }
}
