<?php

namespace App\Http\Livewire\Admin\Destinasi\Destinasi;

use App\Models\Destination;
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
        if(!Gate::allows('hapus destinasi')){
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
        if(!Gate::allows('hapus destinasi')){
            return $this->dispatchBrowserEvent('access');
        }
        $data_post = Destination::findOrFail($id);
        Storage::disk('public')->delete($data_post->image_featured);
        foreach ($data_post->image_galery as $photo) {
            Storage::disk('public')->delete($data_post->photo);
        }
        $data_post->delete();
        $this->reset();
    }
    
    public function render()
    {
        if(!Gate::allows('view destinasi')){
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        $data = Destination::where('name', 'like', '%'. $this->search .'%')->orWhere('address', 'like', '%'. $this->search .'%')->latest()->paginate(5);
        return view('livewire.admin.destinasi.destinasi.index',[
            'data' => $data
        ])->layout('layouts.admin');
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
