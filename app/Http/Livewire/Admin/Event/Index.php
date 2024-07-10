<?php

namespace App\Http\Livewire\Admin\Event;

use App\Models\Event;
use Illuminate\Support\Carbon;
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
        if(!Gate::allows('hapus event')){
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
        if(!Gate::allows('hapus event')){
            return $this->dispatchBrowserEvent('access');
        }
        $data_post = Event::findOrFail($id);
        Storage::disk('public')->delete('/event-festival/' . $data_post->image_featured);
        $data_post->delete();
        $this->reset();
    }
    public function render()
    {
        if(!Gate::allows('view event')){
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        sleep(1);
        $data_now = Event::orderBy('date_time', 'asc')->whereDate('date_time','>=', Carbon::now())->limit(5)->get();
        $data = Event::where('title', 'like', '%'. $this->search .'%')->orWhere('description', 'like', '%'. $this->search .'%')->latest()->paginate(5);
        return view('livewire.admin.event.index',[
            'data_now' => $data_now,
            'data' => $data
        ])->layout('layouts.admin');
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
