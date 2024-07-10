<?php

namespace App\Http\Livewire\Admin\Feed;

use App\Models\Story;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search = '';
    public $amount = 8;
    protected $queryString = ['search'];
    protected $listeners  = ['delete'];


    public function loadMore()
    {
        $this->amount += 8;
    }

    public function deleteConfirm($id)
    {
        if(!Gate::allows('hapus feed')){
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
        if(!Gate::allows('hapus feed')){
            return $this->dispatchBrowserEvent('access');
        }
        $data_post = Story::findOrFail($id);
        $data_post->delete();
        $this->reset();
    }

    public function getDataProperty()
    {
        return Story::when($this->search, function ($builder) {
            $builder->where(function ($builder) {
                $builder->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        })->with('user')->latest()->take($this->amount)->get();
    }

    public function render()
    {
        if(!Gate::allows('view feed')){
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        sleep(1);
        $data = $this->data;
        return view('livewire.admin.feed.index',[
            'data' => $data
        ])->layout('layouts.admin');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
