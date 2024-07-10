<?php

namespace App\Http\Livewire\Dokumen;

use App\Models\Dokumen;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $data_post;
    public $search = '';
    use WithPagination;

    public function download($id)
    {
        $this->data_post = Dokumen::findOrFail($id);
        $dokumen = $this->data_post->file;
        $this->data_post->update([
            'downloader' => $this->data_post->downloader + 1
           ]);
        return response()->download(storage_path('app/public/document/') . $dokumen);
    }
    public function updating($key): void
    {
        if ($key === 'search') {
            $this->resetPage();
        }
    }

    public function render()
    {
        sleep(1);
        $data = Dokumen::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(5);
        return view('livewire.dokumen.index', [
            'data' => $data
        ])->layout('layouts.guest');
    }
}
