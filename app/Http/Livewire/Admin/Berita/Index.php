<?php

namespace App\Http\Livewire\Admin\Berita;

use App\Models\Berita;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $data_post;
    public $deleteId = '';
    public $search = '';

    protected $listeners  = ['delete'];

    public function deleteConfirm($id)
    {
        
        if(!Gate::allows('hapus berita')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->dispatchBrowserEvent('swal:confirm', [
            "type" => 'warning',
            "title" => 'Yakin di Hapus?',
            "text" => '',
            "id" => $id,
        ]);
    }

    public function delete($id)
    {
        if(!Gate::allows('hapus berita')){
            return $this->dispatchBrowserEvent('access');
        }
        $data_post = Berita::findOrFail($id);
        Storage::disk('public')->delete('/berita/' . $data_post->image_featured);
        $data_post->delete();
        $this->reset();
    }

    public function render()
    {
        if(!Gate::allows('view berita')){
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        sleep(1);
        $posts = Berita::withCount('votes')->orderBy('votes_count', 'desc')->get();
        $newberita = Berita::withCount('totalComments', 'votes')->with('user')->latest()->limit(4)->get();
        $data = Berita::where('title', 'like', '%' . $this->search . '%')->orWhere('description', 'like', '%' . $this->search . '%')->latest()->paginate(5);
        return view('livewire.admin.berita.index', [
            'data' => $data,
            'newberita' => $newberita,
        ])->layout('layouts.admin');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
