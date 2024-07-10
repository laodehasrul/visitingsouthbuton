<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use Illuminate\Support\Facades\Gate;
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
        if(!Gate::allows('delete page')){
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
        if(!Gate::allows('delete page')){
            return $this->dispatchBrowserEvent('access');
        }
        $data_post = Page::findOrFail($id);
        $data_post->delete();
        $this->reset();
    }
    
    public function updateTaskOrder($items){
        if(!Gate::allows('edit page')){
            return $this->dispatchBrowserEvent('access');
        }
        foreach($items as $item){
            Page::find($item['value'])->update(['order_position' => $item['order']]);
        }
        $this->dispatchBrowserEvent('swalpopup', [
            "type" => 'success',
            "title" => 'Pages Berhasil di Update!',
            'timer'=>1500,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right'
        ]);

    }
    public function render()
    {
        if(!Gate::allows('view page')){
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        sleep(1);
        $data = Page::where('title', 'like', '%'. $this->search .'%')->orWhere('description', 'like', '%'. $this->search .'%')->orderBy('order_position', 'asc')->paginate(5);
        return view('livewire.admin.pages.index',[
            'data' => $data
        ])->layout('layouts.admin');
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
