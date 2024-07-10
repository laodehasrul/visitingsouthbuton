<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use Livewire\Component;

class Eventvote extends Component
{
    #[Reactive]
    public Event $getevent;
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

        $hasLiked = $user->eventvote()->where('event_id', $this->getevent->id)->exists();
        if($user->hasEventVoted($this->getevent)){
            $user->eventvote()->detach($this->getevent);
            return;
        }
        $user->eventvote()->attach($this->getevent);
    }
    public function render()
    {
        return view('livewire.event.eventvote')->layout('layouts.guest');
    }
}
