<?php

namespace App\Http\Livewire\Destinasi;

use App\Models\Destination;
use Livewire\Component;

class Vote extends Component
{
    #[Reactive]
    public Destination $getdestination;
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

        $hasLiked = $user->destinationvote()->where('destination_id', $this->getdestination->id)->exists();
        if($user->hasDestinationVoted($this->getdestination)){
            $user->destinationvote()->detach($this->getdestination);
            return;
        }
        $user->destinationvote()->attach($this->getdestination);
    }
    public function render()
    {
        return view('livewire.destinasi.vote');
    }
}
