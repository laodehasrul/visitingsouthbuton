<?php

namespace App\Http\Livewire\Berita;

use App\Models\Berita;
use Livewire\Component;

class Beritavote extends Component
{

    #[Reactive]
    public Berita $getberita;
    public function toggleLike(){
        if(auth()->guest()){
            $this->dispatchBrowserEvent('error', [
                'html' => 'Anda tidak memiliki akses ke fitur ini! Silahkan Login/Daftar terlebih dahulu.',
                'timer'=>3000,
                'icon'=>'info',
                'toast'=>true,
                'position'=>'center',
                'showCloseButton'=>true,
                'showCancelButton'=>true,
                'focusConfirm'=>false
            ]);
            //session()->flash('error', 'tidak memiliki akses, silahkan login/daftar terlebih dahulu.');
            return '';
        }
        $user = auth()->user();

        $hasLiked = $user->beritavote()->where('berita_id', $this->getberita->id)->exists();
        if($user->hasBeritaVoted($this->getberita)){
            $user->beritavote()->detach($this->getberita);
            return;
        }
        $user->beritavote()->attach($this->getberita);
    }
    public function render()
    {
        return view('livewire.berita.beritavote')->layout('layouts.guest');
    }

}
