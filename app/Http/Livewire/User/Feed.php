<?php

namespace App\Http\Livewire\User;

use App\Models\Story;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Feed extends Component
{
    use WithPagination;
    public $amount = 6;
    protected $listeners  = ['delete'];
    public function loadMore() {
        $this->amount+=6;
    }
    
    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm',[
            "type" => 'warning',
            "title" => 'Yakin di Hapus?',
            "text" => 'Story akan di hapus.',
            "id" => $id,
        ]);
    }
    public function delete($id)
    {
        $data_post = Story::findOrFail($id);
        Storage::disk('public')->delete('/story/' . $data_post->image);
        $data_post->delete();
        $this->dispatchBrowserEvent('swalpopup', [
            "type" => 'success',
            "title" => 'Cerita Berhasil dihapus!',
            'timer'=>1500,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right'
        ]);
        return '';
    }
    public function render()
    {
        $user = User::findOrFail(auth()->user()->id);
        $allfeed = $user->story()->latest()->take($this->amount)->get();
        return view('livewire.user.feed',[
            'allfeed' => $allfeed
        ])->layout('layouts.guest');
    }
}
