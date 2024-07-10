<?php

namespace App\Http\Livewire\Admin\Inbox;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Gate;

class Index extends Component
{
    use WithPagination;
    public $data_post, $fullname, $email, $subject, $message;
    public $deleteId = '';
    public $search = '';
    public $status = null;
    protected $queryString = ['status'];

    protected $listeners  = ['delete'];
    public $isModalOpen = false;
    public $isEditMode = false;

    public $selectedRows = [];
    public $selectPageRows = false;

    public function showMessage($id)
    {
        $this->data_post = Contact::findOrFail($id);
        $this->fullname = $this->data_post->fullname;
        $this->email = $this->data_post->email;
        $this->subject = $this->data_post->subject;
        $this->message = $this->data_post->message;
        Contact::where('id', $this->data_post->id)->update(['status' => 'read']);
        $this->isEditMode = true;
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->reset();
        $this->isModalOpen = false;
    }
    public function deleteConfirm($id)
    {
        if(!Gate::allows('hapus inbox')){
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
        if(!Gate::allows('hapus inbox')){
            return $this->dispatchBrowserEvent('access');
        }
        $data_post = Contact::findOrFail($id);
        $data_post->delete();
        $this->reset();
        return '';
    }
    public function filterInboxByStatus($status = null)
    {
        $this->status = $status;
    }
    
    public function updatedSelectPageRows($value)
    {
        if ($value) {
            $this->selectedRows = $this->data->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        } else {
            $this->reset(['selectedRows', 'selectPageRows']);
        }
    }
    public function getDataProperty()
    {
        return Contact::when($this->status, function ($builder) {
            $builder->where('status', $this->status);
        })
            ->when($this->search, function ($builder) {
                $builder->where(function ($builder) {
                    $builder->where('fullname', 'like', '%' . $this->search . '%')
                        ->orWhere('subject', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate(5);
    }

    public function deleteSelectedRows()
    {
        if(!Gate::allows('hapus inbox')){
            return $this->dispatchBrowserEvent('access');
        }
        Contact::whereIn('id', $this->selectedRows)->delete();
        $this->dispatch('swal:success');
        $this->reset(['selectPageRows', 'selectedRows']);
    }
    public function markAllAsRead(){
        if(!Gate::allows('edit inbox')){
            return $this->dispatchBrowserEvent('access');
        }
        Contact::whereIn('id', $this->selectedRows)->update(['status' => 'read']);
        $this->dispatch('swal:updated');
        $this->reset(['selectPageRows', 'selectedRows']);
    }
    public function updating($key): void
    {
        if ($key === 'search' || $key === 'status') {
            $this->resetPage();
        }
    }
    public function render()
    {
        if(!Gate::allows('view inbox')){
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        sleep(1);
        $inbox = Contact::count();
        $inboxread = Contact::where('status', 'read')->count();
        $inboxunread = Contact::where('status', 'unread')->count();
        $data = $this->data;

        return view('livewire.admin.inbox.index', [
            'data' => $data,
            'inbox' => $inbox,
            'inboxread' => $inboxread,
            'inboxunread' => $inboxunread,
        ])->layout('layouts.admin');
    }
}
