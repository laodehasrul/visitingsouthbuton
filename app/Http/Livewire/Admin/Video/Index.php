<?php

namespace App\Http\Livewire\Admin\Video;


use App\Models\Video;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $amount = 6;

    public function loadMore() {
        $this->amount+=6;
    }
    
    protected $queryString = ['search'];
    protected $listeners  = ['delete'];

    public function deleteConfirm($id)
    {
        if(!Gate::allows('hapus video')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->dispatchBrowserEvent('swal:confirm',[
            "type" => 'warning',
            "title" => 'Yakin di Hapus?',
            "text" => '',
            "id" => $id,
        ]);
    }

    public function delete($id)
    {
        if(!Gate::allows('hapus video')){
            return $this->dispatchBrowserEvent('access');
        }
        $data_post = Video::findOrFail($id);
        $data_post->delete();
        $this->reset();
    }
    public function render()
    {
        if(!Gate::allows('view video')){
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        sleep(1);
        $videos = Video::where('title', 'like', '%'. $this->search .'%')
        ->orWhere('description', 'like', '%'. $this->search .'%')
        ->latest()->take($this->amount)->get();
        return view('livewire.admin.video.index', [
            'videos' => $videos
        ])->layout('layouts.admin');
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
