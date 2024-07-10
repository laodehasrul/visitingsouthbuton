<?php

namespace App\Http\Livewire\Admin\Kanban;

use App\Models\Kanban;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class Index extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use WithFileUploads;
    public $newimage, $title, $url, $oldimage, $data_post;
    public $isModalOpen = false;
    public $isEditMode = false;
    public $prev_url;
    

    protected $listeners  = ['delete'];

    public function create()
    {
        if(!Gate::allows('tambah kanban')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->reset();
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->resetValidation();
        $this->reset();
        $this->isModalOpen = false;
    }
    /**
     * store
     *
     * @return void
     */
    public function submit()
    {
        if(!Gate::allows('tambah kanban')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate(
            [
                'title' => 'required|min:6',
                'url' => 'nullable|url',
                'newimage' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ],
            [
                'title.required' => 'Judul tidak boleh kosong!',
                'title.min' => 'Judul minimal 6 karakter!',
                'newimage.required' => 'Gambar harus diisi!',
                'newimage.mimes' => 'Format file (jpg, jpeg, png)',
                'newimage.max' => 'Max file 2Mb',
            ]
        );
        if ($this->newimage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->getClientOriginalExtension();
            $this->newimage->storeAs('kanban', $imageName, 'public');
        }
        Kanban::create([
            'title' => $this->title,
            'url' => $this->url,
            'image' => $imageName,
        ]);

        $this->closeModalPopover();
        $this->dispatchBrowserEvent('swalpopup', [
            "type" => 'success',
            "title" => 'Kanban Berhasil di Tambahkan!',
            'timer' => 1500,
            'icon' => 'success',
            'toast' => true,
            'position' => 'top-right'
        ]);
        $this->reset();
    }
    public function showEditModal($id)
    {
        if(!Gate::allows('edit kanban')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->data_post = Kanban::findOrFail($id);
        $this->title = $this->data_post->title;
        $this->url = $this->data_post->url;
        $this->oldimage = $this->data_post->image;
        $this->isEditMode = true;
        $this->isModalOpen = true;
    }

    public function updateData()
    {
        if(!Gate::allows('edit kanban')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate([
            'title' => 'required|min:6',
            'url' => 'nullable|url',
        ], [
            'title.required' => 'Judul tidak boleh kosong!',
            'title.min' => 'Judul minimal 6 karakter!',
        ]);
        $imageName = $this->data_post->image;
        if ($this->newimage) {
            $this->validate(
                [
                    'newimage' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                ],
                [
                    'newimage.mimes' => 'Format file (jpg, jpeg, png)',
                    'newimage.max' => 'Max file 2Mb',
                ]
            );
            Storage::disk('public')->delete('/kanban/' . $imageName);
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->getClientOriginalExtension();
            $this->newimage->storeAs('kanban', $imageName, 'public');
        }
        $this->data_post->update([
            'title' => $this->title,
            'url' => $this->url,
            'image' => $imageName,
        ]);
        $this->dispatchBrowserEvent('swalpopup', [
            "type" => 'success',
            "title" => 'Kanban Berhasil di Update!',
            'timer' => 1500,
            'icon' => 'success',
            'toast' => true,
            'position' => 'top-right'
        ]);
        $this->reset();
        return '';
    }
    public function deleteConfirm($id)
    {
        if(!Gate::allows('hapus kanban')){
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
        if(!Gate::allows('hapus kanban')){
            return $this->dispatchBrowserEvent('access');
        }
        $data_post = Kanban::findOrFail($id);
        Storage::disk('public')->delete('/kanban/' . $data_post->image);
        $data_post->delete();

        $this->reset();
        return '';
    }
    public function render()
    {
        if(!Gate::allows('view kanban')){
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        
        $data = Kanban::orderBy('created_at', 'desc')->latest()->paginate(5);
        return view('livewire.admin.kanban.index', ['data' => $data])->layout('layouts.admin');
    }
}
