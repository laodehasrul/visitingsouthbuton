<?php

namespace App\Http\Livewire\Admin\Dokumen;

use App\Models\Dokumen;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $data_post, $title, $description, $file, $oldfile;
    public $deleteId = '';
    public $search = '';
    public $status = null;

    protected $listeners  = ['delete'];
    public $isModalOpen = false;
    public $isEditMode = false;

    public $selectedRows = [];
    public $selectPageRows = false;

    public function download($id)
    {

        $this->data_post = Dokumen::findOrFail($id);
        $dokumen = $this->data_post->file;
        return response()->download(storage_path('app/public/document/') . $dokumen);
    }
    public function showEditModal($id)
    {
        if(!Gate::allows('edit dokumen')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->data_post = Dokumen::findOrFail($id);
        $this->title = $this->data_post->title;
        $this->description = $this->data_post->description;
        $this->oldfile = $this->data_post->file;
        $this->isEditMode = true;
        $this->isModalOpen = true;
    }

    public function submit()
    {
        if(!Gate::allows('tambah dokumen')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate(
            [
                'title' => 'required',
                'description' => 'nullable',
                'file' => 'required|mimes:jpg,jpeg,png,pdf,docx,doc,txt,csv,xlsx,xls,docx,ppt,pptx,odt,ods,odp|max:5048',
            ],
            [
                'title.required' => 'Judul tidak boleh kosong!',
                'file.required' => 'File harus diisi!',
                'file.mimes' => 'Format file (jpg, png, pdf, doc/docx, etc)',
                'file.max' => 'Maksimal ukuran file 5Mb',
            ]
        );

        if ($this->file) {
            $namewithextension = $this->file->getClientOriginalName();
            $orifilename = explode('.', $namewithextension)[0];
            $fileName = $orifilename . '.' . $this->file->getClientOriginalExtension();
            $this->file->storeAs('document', $fileName, 'public');
        }
        Dokumen::create([
            'title' => $this->title,
            'description' => $this->description,
            'file' => $fileName,
        ]);

        $this->closeModalPopover();
        $this->dispatchBrowserEvent('swalpopup', [
            "type" => 'success',
            "title" => 'Dokumen Berhasil di Tambahkan!',
            'timer' => 1500,
            'icon' => 'success',
            'toast' => true,
            'position' => 'top-right'
        ]);
        $this->reset();
        $this->resetValidation();
    }
    public function updateData()
    {
        if(!Gate::allows('edit dokumen')){
            return $this->dispatchBrowserEvent('access');
        }
        $this->validate([
            'title' => 'required',
            'description' => 'nullable',
        ], [
            'title.required' => 'Judul tidak boleh kosong!',
            'title.min' => 'Judul minimal 6 karakter!',
        ]);
        $fileName = $this->data_post->file;
        if ($this->file) {
            $this->validate(
                [
                    'file' => 'required|mimes:jpg,jpeg,png,pdf,docx,doc,txt,csv,xlsx,xls,docx,ppt,pptx,odt,ods,odp|max:5048',
                ],
                [
                    'file.mimes' => 'Format file (jpg, png, pdf, doc/docx, etc)',
                    'file.max' => 'Maksimal ukuran file 5Mb',
                ]
            );
            Storage::disk('public')->delete('/document/' . $fileName);
            $namewithextension = $this->file->getClientOriginalName();
            $orifilename = explode('.', $namewithextension)[0];
            $fileName = $orifilename . '.' . $this->file->getClientOriginalExtension();
            $this->file->storeAs('document', $fileName, 'public');
        }
        $this->data_post->update([
            'title' => $this->title,
            'description' => $this->description,
            'file' => $fileName,
        ]);
        $this->dispatchBrowserEvent('swalpopup', [
            "type" => 'success',
            "title" => 'Dokumen Berhasil di Update!',
            'timer' => 1500,
            'icon' => 'success',
            'toast' => true,
            'position' => 'top-right'
        ]);
        $this->reset();
        $this->resetValidation();
        return '';
    }

    public function create()
    {
        if(!Gate::allows('tambah dokumen')){
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
    public function showMessage($id)
    {
        $this->data_post = Dokumen::findOrFail($id);

        $this->isModalOpen = true;
    }

    public function deleteConfirm($id)
    {
        if(!Gate::allows('hapus dokumen')){
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
        if(!Gate::allows('hapus dokumen')){
            return $this->dispatchBrowserEvent('access');
        }
        $data_post = Dokumen::findOrFail($id);
        Storage::disk('public')->delete('/document/' . $data_post->image);
        $data_post->delete();
        $this->reset();
        $this->dispatchBrowserEvent('swalpopup', [
            "type" => 'success',
            "title" => 'Dokumen Berhasil dihapus!',
            'timer' => 1500,
            'icon' => 'success',
            'toast' => true,
            'position' => 'top-right'
        ]);
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
        return Dokumen::when($this->search, function ($builder) {
            $builder->where(function ($builder) {
                $builder->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        })
            ->latest()
            ->paginate(5);
    }

    public function deleteSelectedRows()
    {
        if(!Gate::allows('hapus dokumen')){
            return $this->dispatchBrowserEvent('access');
        }
        Dokumen::whereIn('id', $this->selectedRows)->delete();
        $this->dispatch('swal:success');
        $this->reset(['selectPageRows', 'selectedRows']);
    }
    public function updating($key): void
    {
        if ($key === 'search') {
            $this->resetPage();
        }
    }
    public function render()
    {
        if(!Gate::allows('tambah dokumen')){
            return view('livewire.admin.page404')->layout('layouts.admin');
        }
        sleep(1);
        $data = $this->data;
        return view('livewire.admin.dokumen.index', [
            'data' => $data
        ])->layout('layouts.admin');
    }
}
